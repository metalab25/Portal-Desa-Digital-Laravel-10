<?php

namespace App\Http\Controllers;

use App\Models\Idm;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class IdmController extends Controller
{
    public function index()
    {
        $data = Idm::latest()->first();
        $data = json_decode($data['data'], true)['mapData']['ROW'];
        $sorted_keys = ["NO", "INDIKATOR", "SKOR", "KETERANGAN", "KEGIATAN", "NILAI", "PUSAT", "PROV", "KAB", "DESA", "CSR", "LAINNYA"];
        $sorted = [];
        foreach ($data as $index => $row) {
            foreach ($sorted_keys as $k) {
                $sorted[$index][$k] = $row[$k];
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

        // Hanya ambil 4 data teratas
        $chart_idm = array_slice($data_idm, 0, 3);

        return view('dashboard.idm.index', [
            'page'      => 'Indeks Desa Membangun',
            'data'      => $data,
            'data'      => $sorted,
            'idmSkor'   => $data_idm,
            'idmChart'  => $chart_idm
        ]);
    }

    public function fetchAndStoreData()
    {
        $desa = Config::first();
        $kode = $desa->provinsi_id . '' . $desa->kode_kabupaten . '' . $desa->kode_kecamatan . '' . $desa->kode_desa;
        $year = date('Y');
        $url  = 'http://idm.kemendesa.go.id/open/api/desa/rumusan/' . $kode . '/' . $year;

        $response = Http::get($url);

        $data = json_decode($response);

        // dd($data);

        try {
            // Request ke API
            $response = Http::get($url);

            // Periksa apakah request berhasil
            if ($response->successful()) {
                $data = json_decode($response); // Mengambil data dalam bentuk array

                $jsonToString = json_encode($data, true);

                // Cek apakah data sudah ada di database untuk tahun ini
                $existingData = Idm::where('kode_desa', $kode)->where('tahun', $year)->first();

                if ($existingData) {
                    // Update data jika sudah ada
                    $existingData->data = $jsonToString;
                    $existingData->save();
                } else {
                    // Buat entri baru jika belum ada

                    Idm::create([
                        'kode_desa' => $kode,
                        'tahun' => $year,
                        'data' => $jsonToString,
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
