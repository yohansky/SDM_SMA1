<?php

namespace App\Models\config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = "configs";
    protected $fillable = ["logo", "waktu_mulai_absen_staff","waktu_selesai_absen_staff","penilaian_sejawat"];
}
