<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("configs")->insert([
            "logo" => "assets/logo/logo-smansasit.png", 
            "tgl_gajian" => "26", 
            "waktu_mulai_absen_staff" => "08:00", 
            "waktu_selesai_absen_staff" => "14:00",
            "upahperjam" => 0,
        ]);
    }
}
