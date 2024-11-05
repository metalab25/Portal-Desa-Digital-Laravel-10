<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function setApplicationTimezone()
    {
        // Misalnya, ambil dari tabel settings
        $timezone = Pengaturan::where('key', 'timezone')->value('value') ?? 'UTC';

        // Set timezone aplikasi
        config(['app.timezone' => $timezone]);
        date_default_timezone_set($timezone); // Set timezone untuk PHP
    }
}
