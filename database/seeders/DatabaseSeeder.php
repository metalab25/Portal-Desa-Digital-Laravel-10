<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Agama;
use App\Models\Cacat;
use App\Models\CaraKb;
use App\Models\Config;
use App\Models\Provinsi;
use App\Models\Pekerjaan;
use App\Models\StatusKtp;
use App\Models\Pendidikan;
use App\Models\Pengaturan;
use App\Models\StatusDasar;
use App\Models\StatusKawin;
use App\Models\WargaNegara;
use App\Models\JenisKelamin;
use App\Models\PendidikanKk;
use App\Models\SakitMenahun;
use App\Models\GolonganDarah;
use App\Models\JenisKelahiran;
use App\Models\StatusPenduduk;
use App\Models\StatusRekamKtp;
use App\Models\TempatKelahiran;
use Illuminate\Database\Seeder;
use App\Models\HubunganKeluarga;
use App\Models\Kehamilan;
use App\Models\KelompokJabatan;
use App\Models\PenolongKelahiran;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Provinsi Seed
        Provinsi::create([
            'id'    => '11',
            'nama'  => 'Aceh'
        ]);
        Provinsi::create([
            'id'    => '12',
            'nama'  => 'Sumatera Utara'
        ]);
        Provinsi::create([
            'id'    => '13',
            'nama'  => 'Sumatera Barat'
        ]);
        Provinsi::create([
            'id'    => '14',
            'nama'  => 'Riau'
        ]);
        Provinsi::create([
            'id'    => '15',
            'nama'  => 'Jambi'
        ]);
        Provinsi::create([
            'id'    => '16',
            'nama'  => 'Sumatera Selatan'
        ]);
        Provinsi::create([
            'id'    => '17',
            'nama'  => 'Bengkulu'
        ]);
        Provinsi::create([
            'id'    => '18',
            'nama'  => 'Lampung'
        ]);
        Provinsi::create([
            'id'    => '19',
            'nama'  => 'Kepulauan Bangka Belitung'
        ]);
        Provinsi::create([
            'id'    => '21',
            'nama'  => 'Kepulauan Riau'
        ]);
        Provinsi::create([
            'id'    => '31',
            'nama'  => 'DKI Jakarta'
        ]);
        Provinsi::create([
            'id'    => '32',
            'nama'  => 'Jawa Barat'
        ]);
        Provinsi::create([
            'id'    => '33',
            'nama'  => 'Jawa Tengah'
        ]);
        Provinsi::create([
            'id'    => '34',
            'nama'  => 'DI Yogyakarta'
        ]);
        Provinsi::create([
            'id'    => '35',
            'nama'  => 'Jawa Timur'
        ]);
        Provinsi::create([
            'id'    => '26',
            'nama'  => 'Banten'
        ]);
        Provinsi::create([
            'id'    => '51',
            'nama'  => 'Bali'
        ]);
        Provinsi::create([
            'id'    => '52',
            'nama'  => 'Nusa Tenggara Barat'
        ]);
        Provinsi::create([
            'id'    => '53',
            'nama'  => 'Nusa Tenggara Timur'
        ]);
        Provinsi::create([
            'id'    => '61',
            'nama'  => 'Kalimantan Barat'
        ]);
        Provinsi::create([
            'id'    => '62',
            'nama'  => 'Kalimantan Tengah'
        ]);
        Provinsi::create([
            'id'    => '63',
            'nama'  => 'Kalimantan Selatan'
        ]);
        Provinsi::create([
            'id'    => '64',
            'nama'  => 'Kalimantan Timur'
        ]);
        Provinsi::create([
            'id'    => '65',
            'nama'  => 'Kalimantan Utara'
        ]);
        Provinsi::create([
            'id'    => '71',
            'nama'  => 'Sulawesi Utara'
        ]);
        Provinsi::create([
            'id'    => '72',
            'nama'  => 'Sulawesi Tengah'
        ]);
        Provinsi::create([
            'id'    => '73',
            'nama'  => 'Sulawesi Selatan'
        ]);
        Provinsi::create([
            'id'    => '74',
            'nama'  => 'Sulawesi Tenggara'
        ]);
        Provinsi::create([
            'id'    => '75',
            'nama'  => 'Gorontalo'
        ]);
        Provinsi::create([
            'id'    => '76',
            'nama'  => 'Sulawesi Barat'
        ]);
        Provinsi::create([
            'id'    => '81',
            'nama'  => 'Maluku'
        ]);
        Provinsi::create([
            'id'    => '82',
            'nama'  => 'Maluku Utara'
        ]);
        Provinsi::create([
            'id'    => '91',
            'nama'  => 'Papua'
        ]);
        Provinsi::create([
            'id'    => '92',
            'nama'  => 'Papua barat'
        ]);

        // Roles
        Role::create([
            'nama'          => 'Administrator',
        ]);
        Role::create([
            'nama'          => 'Operator',
        ]);
        Role::create([
            'nama'          => 'Redaksi',
        ]);
        Role::create([
            'nama'          => 'Kontributor',
        ]);

        // Users
        User::create([
            'nama'          => 'Happy Agung',
            'username'      => 'metalab',
            'email'         => 'metalabmetadata@gmail.com',
            'phone'         => '08123456789',
            'password'      => Hash::make('Metadata25'),
            'status'        => '1',
            'role_id'       => '1'
        ]);

        // Config Desa
        Config::create([
            'nama_desa'         =>  'Desa Songkel',
            'kode_desa'         =>  '1234',
            'alamat_kantor'     =>  'Jalan Pesonget, Dusun Belitung No. 4',
            'nama_kecamatan'    =>  'Songkel',
            'kode_kecamatan'    =>  '37',
            'nama_kabupaten'    =>  'Dasingan',
            'kode_kabupaten'    =>  '02',
            'provinsi_id'       =>  '75',
            'kode_pos'          =>  '86536',
            'telepon'           =>  '0365023562',
            'email_desa'        =>  'desasongkel@gmail.com',
            'website'           =>  'https://www.songkel.desa.id',
            'nama_kepala_desa'  =>  'Bahrudin',
            'nama_kepala_camat' =>  'Suryadi',
            'logo'              =>  'logos/lIcWsKJr5zKAUTInbN7HN4Yy2dnAzt9hlYhFaPcD.png'
        ]);

        // Pengaturan Aplikasi
        Pengaturan::create([
            'sebutan_desa' => 'Desa',
            'sebutan_kecamatan' => 'Kecamatan',
            'sebutan_kabupaten' => 'Kabupaten',
            'sebutan_dusun' => 'Dusun',
            'sebutan_kepala_desa' => 'Kepala Desa',
            'sebutan_camat' => 'Camat',
            'sebutan_bupati' => 'Bupati',
            'sebutan_kepala_dusun' => 'Kepala Dusun',
            'singkatan_desa' => 'Desa',
            'singkatan_kecamatan' => 'Kec.',
            'singkatan_kabupaten' => 'Kab.',
            'singkatan_dusun' => 'Dusun',
            'format_nomor_surat' => '',
            'zona_waktu' => '2',
            'title_web' => 'Website Desa'
        ]);

        // Agama
        Agama::create([
            'nama'  => 'Islam'
        ]);
        Agama::create([
            'nama'  => 'Kristen'
        ]);
        Agama::create([
            'nama'  => 'Katholik'
        ]);
        Agama::create([
            'nama'  => 'Hindu'
        ]);
        Agama::create([
            'nama'  => 'Budha'
        ]);
        Agama::create([
            'nama'  => 'Khonghucu'
        ]);
        Agama::create([
            'nama'  => 'Kepercayaan Terhadap Tuhan YME / Lainnya'
        ]);

        // Jenis Kelamin
        JenisKelamin::create([
            'nama'  => 'Laki-laki'
        ]);
        JenisKelamin::create([
            'nama'  => 'Perempuan'
        ]);

        // Hubungan Dalam Keluarga
        HubunganKeluarga::create([
            'nama'  => 'Kepala Keluarga'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Suami'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Istri'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Anak'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Menantu'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Cucu'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Orang Tua'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Mertua'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Famili'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Pembantu'
        ]);
        HubunganKeluarga::create([
            'nama'  => 'Lainnya'
        ]);

        // Status Kawin
        StatusKawin::create([
            'nama'  => 'Belum Kawin'
        ]);
        StatusKawin::create([
            'nama'  => 'Kawin'
        ]);
        StatusKawin::create([
            'nama'  => 'Cerai Hidup'
        ]);
        StatusKawin::create([
            'nama'  => 'Cerai Mati'
        ]);

        // Kewarganegaraan
        WargaNegara::create([
            'nama'  => 'WNI'
        ]);
        WargaNegara::create([
            'nama'  => 'WNA'
        ]);
        WargaNegara::create([
            'nama'  => 'Dua Kewarganegaraan'
        ]);

        // Golongan Darah
        GolonganDarah::create([
            'nama'  => 'A'
        ]);
        GolonganDarah::create([
            'nama'  => 'B'
        ]);
        GolonganDarah::create([
            'nama'  => 'AB'
        ]);
        GolonganDarah::create([
            'nama'  => 'O'
        ]);
        GolonganDarah::create([
            'nama'  => 'A+'
        ]);
        GolonganDarah::create([
            'nama'  => 'A-'
        ]);
        GolonganDarah::create([
            'nama'  => 'B+'
        ]);
        GolonganDarah::create([
            'nama'  => 'B-'
        ]);
        GolonganDarah::create([
            'nama'  => 'AB+'
        ]);
        GolonganDarah::create([
            'nama'  => 'AB-'
        ]);
        GolonganDarah::create([
            'nama'  => 'O+'
        ]);
        GolonganDarah::create([
            'nama'  => 'O-'
        ]);
        GolonganDarah::create([
            'nama'  => 'Tidak Tahu'
        ]);

        // Status Kependudukan
        StatusPenduduk::create([
            'nama'  => 'Tetap'
        ]);
        StatusPenduduk::create([
            'nama'  => 'Tidak Tetap'
        ]);
        StatusPenduduk::create([
            'nama'  => 'Pendatang'
        ]);

        // Status Dasar Penduduk
        StatusDasar::create([
            'nama'  => 'Hidup'
        ]);
        StatusDasar::create([
            'nama'  => 'Mati'
        ]);
        StatusDasar::create([
            'nama'  => 'Pindah'
        ]);
        StatusDasar::create([
            'nama'  => 'Hilang'
        ]);
        StatusDasar::create([
            'nama'  => 'Tidak Valid'
        ]);

        // Status KTP
        StatusKtp::create([
            'nama'  => 'Belum'
        ]);
        StatusKtp::create([
            'nama'  => 'KTP-EL'
        ]);

        // Status Rekam KTP
        StatusRekamKtp::create([
            'status_ktp_id' => '1',
            'nama'  => 'Belum Wajib'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '1',
            'nama'  => 'Belum Rekam'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Sudah Rekam'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Card Printed'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Print Ready Record'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Card Shipped'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Sent For Card Printing'
        ]);
        StatusRekamKtp::create([
            'status_ktp_id' => '2',
            'nama'  => 'Card Issued'
        ]);

        // Cacat
        Cacat::create([
            'nama'  => 'Cacat Fisik'
        ]);
        Cacat::create([
            'nama'  => 'Cacat Netra/Buta'
        ]);
        Cacat::create([
            'nama'  => 'Cacat Rungu/Wicara'
        ]);
        Cacat::create([
            'nama'  => 'Cacat Mental/Jiwa'
        ]);
        Cacat::create([
            'nama'  => 'Cacat Fisik dan Mental'
        ]);
        Cacat::create([
            'nama'  => 'Cacat Lainnya'
        ]);
        Cacat::create([
            'nama'  => 'Tidak Cacat'
        ]);

        // Sakit Menahun
        SakitMenahun::create([
            'nama'  => 'Jantung'
        ]);
        SakitMenahun::create([
            'nama'  => 'Lever'
        ]);
        SakitMenahun::create([
            'nama'  => 'Paru-paru'
        ]);
        SakitMenahun::create([
            'nama'  => 'Kanker'
        ]);
        SakitMenahun::create([
            'nama'  => 'Stroke'
        ]);
        SakitMenahun::create([
            'nama'  => 'Diabetes Melitus'
        ]);
        SakitMenahun::create([
            'nama'  => 'Ginjal'
        ]);
        SakitMenahun::create([
            'nama'  => 'Malaria'
        ]);
        SakitMenahun::create([
            'nama'  => 'Lepra/Kusta'
        ]);
        SakitMenahun::create([
            'nama'  => 'HIV/AIDS'
        ]);
        SakitMenahun::create([
            'nama'  => 'Gila/Stress'
        ]);
        SakitMenahun::create([
            'nama'  => 'TBC'
        ]);
        SakitMenahun::create([
            'nama'  => 'Asthma'
        ]);
        SakitMenahun::create([
            'nama'  => 'Tidak Ada/Tidak Sakit'
        ]);

        // Cara KB
        CaraKb::create([
            'jenis_kelamin_id'  => '1',
            'nama'  => 'Kondom'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '1',
            'nama'  => 'Sterilisasi Pria'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Pil'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Iud'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Suntik'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Susuk KB'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Sterilisasi Wanita'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Lainnya'
        ]);
        CaraKb::create([
            'jenis_kelamin_id'  => '2',
            'nama'  => 'Tidak KB'
        ]);

        // Jenis Kelahiran
        JenisKelahiran::create([
            'nama'  => 'Tunggal'
        ]);
        JenisKelahiran::create([
            'nama'  => 'Kembar 2'
        ]);
        JenisKelahiran::create([
            'nama'  => 'Kembar 3'
        ]);
        JenisKelahiran::create([
            'nama'  => 'Kembar 4'
        ]);

        // Tempat Kelahiran
        TempatKelahiran::create([
            'nama'  => 'RS/RB'
        ]);
        TempatKelahiran::create([
            'nama'  => 'Puskesmas'
        ]);
        TempatKelahiran::create([
            'nama'  => 'Polindes'
        ]);
        TempatKelahiran::create([
            'nama'  => 'Rumah'
        ]);
        TempatKelahiran::create([
            'nama'  => 'Lainnya'
        ]);

        // Penolong Kelahiran
        PenolongKelahiran::create([
            'nama'  => 'Dokter'
        ]);
        PenolongKelahiran::create([
            'nama'  => 'Bidan Perawat'
        ]);
        PenolongKelahiran::create([
            'nama'  => 'Dukun'
        ]);
        PenolongKelahiran::create([
            'nama'  => 'Lainnya'
        ]);

        // Pendidikan Dalam KK
        PendidikanKk::create([
            'nama'  => 'Tidak/Belum Sekolah'
        ]);
        PendidikanKk::create([
            'nama'  => 'Belum Tamat SD/Sederajat'
        ]);
        PendidikanKk::create([
            'nama'  => 'Tamat SD/Sederajat'
        ]);
        PendidikanKk::create([
            'nama'  => 'SLTP/Sederajat'
        ]);
        PendidikanKk::create([
            'nama'  => 'SLTA/Sederajat'
        ]);
        PendidikanKk::create([
            'nama'  => 'Diploma I/II'
        ]);
        PendidikanKk::create([
            'nama'  => 'Akademi/Diploma III/S. Muda'
        ]);
        PendidikanKk::create([
            'nama'  => 'Diploma IV/Strata I'
        ]);
        PendidikanKk::create([
            'nama'  => 'Strata II'
        ]);
        PendidikanKk::create([
            'nama'  => 'Strata III'
        ]);

        // Pendidikan Ditempuh
        Pendidikan::create([
            'nama'  => 'Belum Masuk TK/Kelompok Bermain'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang TK/Kelompok Bermain'
        ]);
        Pendidikan::create([
            'nama'  => 'Tidak Pernah Sekolah'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SD/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Tidak Tamat SD/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SLTP/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SLTA/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang D-I/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang D-II/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang D-III/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang S-I/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang S-II/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang S-III/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SLB A/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SLB B/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Sedang SLB C/Sederajat'
        ]);
        Pendidikan::create([
            'nama'  => 'Tidak Dapat Membaca Dan Menulis Huruf Latin/Arab'
        ]);
        Pendidikan::create([
            'nama'  => 'Tidak Sekolah'
        ]);

        // Pekerjaan
        Pekerjaan::create([
            'nama'  => 'Belum/Tidak Bekerja'
        ]);
        Pekerjaan::create([
            'nama'  => 'Mengurus Rumah Tangga'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pelajar/Mahasiswa'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pensiunan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pegawai Negeri Sipil (PNS)'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tentara Nasional Indonesia (TNI)'
        ]);
        Pekerjaan::create([
            'nama'  => 'Kepolisian (POLRI)'
        ]);
        Pekerjaan::create([
            'nama'  => 'Perdagangan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Petani/Pekebun'
        ]);
        Pekerjaan::create([
            'nama'  => 'Peternak'
        ]);
        Pekerjaan::create([
            'nama'  => 'Nelayan/Peternakan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Industri'
        ]);
        Pekerjaan::create([
            'nama'  => 'Konstruksi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Transportasi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Karyawan Swasta'
        ]);
        Pekerjaan::create([
            'nama'  => 'Karyawan BUMN'
        ]);
        Pekerjaan::create([
            'nama'  => 'Karyawan BUMD'
        ]);
        Pekerjaan::create([
            'nama'  => 'Karyawan Honorer'
        ]);
        Pekerjaan::create([
            'nama'  => 'Buruh Harian Lepas'
        ]);
        Pekerjaan::create([
            'nama'  => 'Buruh Tani/Perkebunan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Buruh Nelayan/Perikanan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Buruh Peternakan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pembantu Rumah Tangga'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Cukur'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Listrik'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Batu'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Kayu'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Sol Sepatu'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Las/Pandai Besi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Jahit'
        ]);
        Pekerjaan::create([
            'nama'  => 'Tukang Gigi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Penata Rias'
        ]);
        Pekerjaan::create([
            'nama'  => 'Penata Busana'
        ]);
        Pekerjaan::create([
            'nama'  => 'Penterjemah'
        ]);
        Pekerjaan::create([
            'nama'  => 'Imam Masjid'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pendeta'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pastor'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wartawan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Uztadz/Mubaligh'
        ]);
        Pekerjaan::create([
            'nama'  => 'Juru Masak'
        ]);
        Pekerjaan::create([
            'nama'  => 'Promotor Acara'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota DPR RI'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota DPD'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota BPK'
        ]);
        Pekerjaan::create([
            'nama'  => 'Presiden'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wakil Presiden'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota Mahkamah Kostitusi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota Kabinet Kementerian'
        ]);
        Pekerjaan::create([
            'nama'  => 'Duta Besar'
        ]);
        Pekerjaan::create([
            'nama'  => 'Gubernur'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wakil Gubernur'
        ]);
        Pekerjaan::create([
            'nama'  => 'Bupati'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wakil Bupati'
        ]);
        Pekerjaan::create([
            'nama'  => 'Walikota'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wakil Walikota'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota DPRD Provinsi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Anggota DPRD Kabupaten/Kota'
        ]);
        Pekerjaan::create([
            'nama'  => 'Dosen'
        ]);
        Pekerjaan::create([
            'nama'  => 'Guru'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pilot'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pengacara'
        ]);
        Pekerjaan::create([
            'nama'  => 'Notaris'
        ]);
        Pekerjaan::create([
            'nama'  => 'Arsitek'
        ]);
        Pekerjaan::create([
            'nama'  => 'Akuntan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Konsultan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Dokter'
        ]);
        Pekerjaan::create([
            'nama'  => 'Bidan'
        ]);
        Pekerjaan::create([
            'nama'  => 'Perawat'
        ]);
        Pekerjaan::create([
            'nama'  => 'Apoteker'
        ]);
        Pekerjaan::create([
            'nama'  => 'Psikiater/Psikolog'
        ]);
        Pekerjaan::create([
            'nama'  => 'Penyiar Televisi'
        ]);
        Pekerjaan::create([
            'nama'  => 'Penyiar Radio'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pelaut'
        ]);
        Pekerjaan::create([
            'nama'  => 'Peneliti'
        ]);
        Pekerjaan::create([
            'nama'  => 'Sopir'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pialang'
        ]);
        Pekerjaan::create([
            'nama'  => 'Paranormal'
        ]);
        Pekerjaan::create([
            'nama'  => 'Pedagang'
        ]);
        Pekerjaan::create([
            'nama'  => 'Perangkat Desa'
        ]);
        Pekerjaan::create([
            'nama'  => 'Kepala Desa'
        ]);
        Pekerjaan::create([
            'nama'  => 'Biarawati'
        ]);
        Pekerjaan::create([
            'nama'  => 'Wiraswasta'
        ]);
        Pekerjaan::create([
            'nama'  => 'Lainnya'
        ]);

        // Kehamilan
        Kehamilan::create([
            'nama'  => 'Hamil'
        ]);
        Kehamilan::create([
            'nama'  => 'Tidak Hamil'
        ]);

        // Jabatan Kelompok
        KelompokJabatan::create([
            'nama'  => 'Ketua'
        ]);
        KelompokJabatan::create([
            'nama'  => 'Wakil Ketua'
        ]);
        KelompokJabatan::create([
            'nama'  => 'Sekretaris'
        ]);
        KelompokJabatan::create([
            'nama'  => 'Bendahara'
        ]);
        KelompokJabatan::create([
            'nama'  => 'Anggota'
        ]);
    }
}
