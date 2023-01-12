<?php

namespace App\Models\pembelajaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $table = "lessons"; 
    protected $fillable = ["kode_mapel", "nama"];
    public $incrementing = false;
}
