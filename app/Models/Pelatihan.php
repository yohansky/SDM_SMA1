<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
class Pelatihan extends Model
{
    use HasFactory;
    protected $table = ["training_info"];
    protected $fillable = ["tanggal", "desc", "user_id"];

    public function getUser(){
        return $this->belongsTo(User::class);
    }
}
