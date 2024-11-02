<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Path ke file SQL dump
        $sqlPath = database_path('dumps/dump.sql');

        // Baca file SQL
        $sql = file_get_contents($sqlPath);

        // Eksekusi SQL dump
        DB::unprepared($sql);
    }
}
