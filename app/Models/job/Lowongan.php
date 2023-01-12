<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = "vacancies";
    protected $fillable = ["jabatan", "desc", "syarat", "keahlian", "status"];
    
}
