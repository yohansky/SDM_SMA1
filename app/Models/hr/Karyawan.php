<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\master\Jabatan;
use App\Models\master\Agama;
use App\Models\absensi\AbsensiStaff;
use App\Models\pembelajaran\jadwal;
use App\Models\sejawat\PenilaianModel;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "employee";
    protected $fillable = [
        "NIK",
        "NIP",
        "photo",
        "nama",
        "jenis_kelamin",
        "tempat_tgl_lahir",
        "kewarganegaraan",
        "pendidikan_terakhir",
        "agama",
        "status_perkawinan",
        "alamat",
        "email",
        "no_telp",
        "mulai_kerja",
        "jabatan",
        "retire_date",
        "status"
    ];
    public $incrementing = "false";

    public function getJabatan(){
        return $this->belongsTo(Jabatan::class, "jabatan", "id");
    }

    public function getAgama(){
        return $this->belongsTo(Agama::class, "agama", "id");
    }

    public function Guru(){
        return $this->belongsTo(Jabatan::class, "jabatan", "id")->where("name", "LIKE", "%guru%");
    }

    public function Absensi(){
        return $this->hasMany(AbsensiStaff::class, "K_NIK","NIK");
    }

    public function jadwal(){
        return $this->hasMany(jadwal::class, "pengajar", "NIK");
    }

    public function getPenilaian(){
        return $this->hasMany(PenilaianModel::class, "nik_penilai", "NIK");
    }
}


