<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = "vacancies_applicant";
    protected $fillable = ["vacancy_id", "name", "nip", "jenis_kelamin", "tempat_tgl_lahir", "no_hp", "email", "alamat_lengkap", "agama", "status_perkawinan", "kewarganegaraan", "link_sertifikat" ,"cv" ,"catatan"];
}
