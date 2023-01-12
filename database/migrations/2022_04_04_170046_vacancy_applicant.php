<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VacancyApplicant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies_applicant', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('vacancy_id');
            $table->string('name');
            $table->string('nip');
            $table->string('jenis_kelamin');
            $table->string('tempat_tgl_lahir');
            $table->string('no_hp');
            $table->string('email');
            $table->text('alamat_lengkap');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('kewarganeraan');
            $table->text('catatan');
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
        //
    }
}
