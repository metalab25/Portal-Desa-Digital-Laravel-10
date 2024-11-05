<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Config;
use App\Models\Pengaturan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ambil pengaturan zone_waktu dari database
        // $zoneWaktu = Pengaturan::first(); // Aktifkan setelah dumping data
        // $timezone = $zoneWaktu->zona_waktu; // Aktifkan setelah dumping data
        // config(['app.timezone' => $timezone]); // Aktifkan setelah dumping data
        // date_default_timezone_set($timezone); // Aktifkan setelah dumping data

        // Indonesia Datetime
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // Paginator
        Paginator::useBootstrap();

        // Desa Data
        // $desa = Config::first(); // Aktifkan setelah dumping data
        // View::share('desa', $desa); // Aktifkan setelah dumping data

        // Setting Data
        // $setting = Pengaturan::first(); // Aktifkan setelah dumping data
        // View::share('setting', $setting); // Aktifkan setelah dumping data

        // Tanggal Hari ini
        $tanggalHariIni = Carbon::now();
        View::share('tanggal', $tanggalHariIni);
    }
}
