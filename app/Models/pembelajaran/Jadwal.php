<?php

namespace App\Models\pembelajaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Karyawan;
use App\Models\absensi\AbsensiGuru;
use App\Models\pembelajaran\Pelajaran;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "schedule";
    protected $fillable = ["mapel","pengajar","kelas","hari","mulai", "selesai"];

    public function getKaryawan(){
        return $this->belongsTo(Karyawan::class, "pengajar", "NIK");
    }

    public function getMapel(){
        return $this->belongsTo(Pelajaran::class, "mapel", "kode_mapel");
    }

    public function getKelas(){
        return $this->belongsTo(Kelas::class, "kelas", "id");
    }

    public function getAbsensi(){
        return $this->hasMany(AbsensiGuru::class, "jadwal_id", "id");
    }

}
