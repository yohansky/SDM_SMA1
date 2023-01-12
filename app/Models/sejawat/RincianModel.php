<?php

namespace App\Models\sejawat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianModel extends Model
{
    use HasFactory;
    protected $table = "penilaian_detail";
    protected $fillable = [
    "penilaian_id",
    "pilihan_1",
    "pilihan_2",
    "pilihan_3",
    "pilihan_4",
    "pilihan_5",
    "pilihan_6",
    "pilihan_7",
    "pilihan_8",
    "pilihan_9",
    "pilihan_10",
    "pilihan_11",
    "pilihan_12",
    "pilihan_13",
    "pilihan_14",
    ];

    public $timestamps = false;
}
