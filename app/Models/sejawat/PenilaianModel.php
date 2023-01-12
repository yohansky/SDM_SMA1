<?php

namespace App\Models\sejawat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    use HasFactory;
    protected $table = "penilaian_sejawat";
    protected $fillable = ["nik_penilai", "nik_dinilai", "nilai"];
    public $timestamps = false;
}
