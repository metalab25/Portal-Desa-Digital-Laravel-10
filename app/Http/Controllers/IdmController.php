<?php

namespace App\Http\Controllers;

use App\Models\Idm;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IdmController extends Controller
{
    public function index()
    {
        $data = Idm::first();
        $data = json_decode($data['data'], true)['mapData']['ROW'];

        $sorted_keys = ["NO","INDIKATOR","SKOR","KETERANGAN","KEGIATAN","NILAI","PUSAT","PROV","KAB","DESA","CSR","LAINNYA","ROW_CELL"];
        $sorted = [];
        foreach ($data as $index => $row) {
            foreach ($sorted_keys as $k) {
                $sorted[$index][$k] = $row[$k];
            }
        }

        return view('dashboard.idm.index', [
            'page'  => 'Index Desa Membangun',
            'data'   => $sorted
        ]);
    }

    public function fetchAndStoreData()
    {
        $desa = Config::first();
        $kode = $desa->provinsi_id . '' . $desa->kode_kabupaten . '' . $desa->kode_kecamatan . '' . $desa->kode_desa;
        $year = date('Y');
        $url  = $url = 'http://idm.kemendesa.go.id/open/api/desa/rumusan/' . $kode . '/' . $year;

        try {
            // Request ke API
            $response = Http::get($url);

            // Periksa apakah request berhasil
            if ($response->successful()) {
                $data = $response->json(); // Mengambil data dalam bentuk array

                $jsonToString = json_encode($data);

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

                return response()->json(['message' => 'Data berhasil disimpan'], 200);
            } else {
                return response()->json(['error' => 'Gagal mengambil data dari API'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
