<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hr\Karyawan;

class Mutasi extends Model
{
    use HasFactory;
    protected $table = "mutasi"; 
    protected $fillable = ["NIK", "tanggal_masuk", "keterangan", "dari_instansi", "ke_instansi", "status"];


    public function Karyawan(){
        return $this->belongsTo(Karyawan::class, "NIK", "NIK");
    }

}
