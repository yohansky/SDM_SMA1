<?php

namespace App\Models\absensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pembelajaran\Jadwal;

class AbsensiGuru extends Model
{
    use HasFactory;
    protected $table = "teach_presence";
    protected $fillable = ["jadwal_id", "status", "desc", "tanggal", "longitude", "latitude"];

    public function getJadwal(){
        return $this->belongsTo(Jadwal::class, "jadwal_id","id");
    }
}
