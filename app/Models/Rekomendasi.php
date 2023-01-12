<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Karyawan;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $table = "rekomendasi";
    protected $fillable = ["nik", "golongan", "status"];
    public $timestamps = false;


    public function nikInfo(){
        return $this->belongsTo(Karyawan::class, "nik", "NIK");
    }
}
