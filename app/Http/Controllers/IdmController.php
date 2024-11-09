<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Idm;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class IdmController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $years = range($currentYear, $currentYear - 3);

        $selectedYear = $request->input('tahun') ?? $currentYear;

        $dataRecord = Idm::where('tahun', $selectedYear)->latest()->first();

        if (!$dataRecord) {
            return $this->fetchAndStoreData($selectedYear);
        }

        $data = json_decode($dataRecord->data, true)['mapData']['ROW'] ?? [];
        $sorted_keys = ["NO", "INDIKATOR", "SKOR", "KETERANGAN", "KEGIATAN", "NILAI", "PUSAT", "PROV", "KAB", "DESA", "CSR", "LAINNYA"];
        $sorted = [];

        foreach ($data as $index => $row) {
            foreach ($sorted_keys as $k) {
                $sorted[$index][$k] = $row[$k] ?? null;
            }
        }

        $data_idm = [];
        foreach ($data as $value) {
            if (empty($value['NO'])) {
                $data_idm[] = [
                    'INDIKATOR' => $value['INDIKATOR'] ?? null,
                    'SKOR' => $value['SKOR'] ?? null,
                ];
            }
        }

        $chart_idm = array_slice($data_idm, 0, 3);

        return view('dashboard.idm.index', [
            'page' => 'Indeks Desa Membangun',
            'years' => $years,
            'selectedYear' => $selectedYear,
            'data' => $sorted,
            'idmSkor'   => $data_idm,
            'idmChart'  => $chart_idm
        ]);
    }

    public function fetchAndStoreData($tahun)
    {
        $desa = Config::first();
        $kode = $desa->provinsi_id . $desa->kode_kabupaten . $desa->kode_kecamatan . $desa->kode_desa;
        $url  = 'http://idm.kemendesa.go.id/open/api/desa/rumusan/' . $kode . '/' . $tahun;

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $data = json_decode($response, true);
                $jsonToString = json_encode($data);

                $existingData = Idm::where('kode_desa', $kode)->where('tahun', $tahun)->first();

                if ($existingData) {
                    $existingData->data = $jsonToString;
                    $existingData->save();
                } else {
                    Idm::create([
                        'kode_desa' => $kode,
                        'tahun'     => $tahun,
                        'data'      => $jsonToString,
                    ]);
                }
                Alert::success('Success', 'Data berhasil disimpan');
                return redirect()->route('idm.index');
                // return response()->json(['message' => 'Data berhasil disimpan'], 200);
            } else {
                return response()->json(['error' => 'Gagal mengambil data dari API'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
