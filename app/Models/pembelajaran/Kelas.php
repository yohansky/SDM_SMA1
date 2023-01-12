<?php

namespace App\Models\pembelajaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "classrooms";
    protected $fillable = ["kelas","wali_kelas"];
    public $incrementing = false;
}
