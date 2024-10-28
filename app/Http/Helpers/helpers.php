<?php

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jum\'at',
        'Sabtu'
    );
    $nama_bulan = array(
        1 =>
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari        = $nama_hari[$urutan_hari];
        $text       .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text       .= "$tanggal $bulan $tahun";
    }

    return $text;
}

if (!function_exists('formatWaNumber')) {
    function formatWaNumber($phoneNumber)
    {
        // Cek apakah nomor dimulai dengan '0' dan panjangnya lebih dari 1
        if (substr($phoneNumber, 0, 1) == '0') {
            // Ganti awalan '0' dengan '+62'
            return '+62' . substr($phoneNumber, 1);
        }

        // Jika nomor sudah dalam format internasional, kembalikan nomor aslinya
        return $phoneNumber;
    }
}
