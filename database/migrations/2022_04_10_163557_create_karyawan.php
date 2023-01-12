<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->string("NIK")->primary();
            $table->string("photo");
            $table->string("nama");
            $table->string("jenis_kelamin");
            $table->string("tempat_tgl_lahir");
            $table->string("kewarganegaraan");
            $table->string("pendidikan_terakhir");
            $table->string("agama");
            $table->string("status_perkawinan");
            $table->string("tanggungan");
            $table->string("alamat");
            $table->string("email")->unique();
            $table->string("no_telp");
            $table->date("mulai_kerja");
            $table->string("jabatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
