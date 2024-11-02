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
        // Indonesia Datetime
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // Paginator
        Paginator::useBootstrap();

        // Desa Data
        // $desa = Config::first();
        // View::share('desa', $desa);

        // Setting Data
        // $setting = Pengaturan::first();
        // View::share('setting', $setting);

        // Tanggal Hari ini
        $tanggalHariIni = Carbon::now();
        View::share('tanggal', $tanggalHariIni);
    }
}
