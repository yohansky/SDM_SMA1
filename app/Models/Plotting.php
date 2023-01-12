<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plotting extends Model
{
    use HasFactory;
    protected $table = "plotting";
    protected $fillable = ["NIK_penilai", "NIK_dinilai", "status"];
}
