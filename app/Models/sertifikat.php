<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    use HasFactory;
    protected $table = "sertifikat";
    protected $fillable = ["nik","link"];
}
