<?php

namespace App\Models\absensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Karyawan;

class AbsensiStaff extends Model
{
    use HasFactory;
    protected $table = "staff_presence";
    protected $fillable = ["K_NIK", "status", "desc", "tanggal", "jam_absen_masuk", "jam_absen_keluar","desc", "logitude", "latitude"];

    public function staff(){
        return $this->belongsTo(Karyawan::class, "K_NIK", "NIK");
    }
}
