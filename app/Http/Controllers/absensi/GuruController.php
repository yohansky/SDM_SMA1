<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hr\Karyawan;
use App\Models\pembelajaran\Jadwal;
use App\Models\absensi\AbsensiGuru;
use Auth;

class GuruController extends Controller
{
    //
    public function index(){
        $karyawan = Karyawan::where("jabatan","J000")->orWhere("Jabatan", "J001")->orderBy("NIK", "DESC")->get();
        return view("dashboard.pages.absensi.guru.index")->with(["karyawan" => $karyawan]);
    }

    public function listJadwal($id){
        $jadwal = Jadwal::with(["getAbsensi","getMapel"])->where("pengajar", $id)->get();
        return view("dashboard.pages.absensi.guru.jadwal")->with(["jadwal" => $jadwal]);
    }

    public function guruJadwal(){
        $jadwal = Jadwal::with(["getAbsensi","getMapel"])->where("pengajar", Auth()->user()->nik)->get();
        return view("dashboard.pages.absensi.guru.jadwal")->with(["jadwal" => $jadwal]);
    }
    
    public function absenJadwal($guruid, $mapelid){
        $absen = AbsensiGuru::whereRelation("getJadwal", "pengajar", "=", $guruid)->whereRelation("getJadwal", "mapel", "=", $mapelid)->get();
        $jadwal = Jadwal::where("pengajar", $guruid)->where("mapel", $mapelid)->first();
        return view("dashboard.pages.absensi.guru.absenjadwal")->with(["absen" => $absen, "jadwal" => $jadwal]);
    }
    
    public function postAbsen(Request $req){
        $data = $req->all();
        if (!$data["longitude"] || !$data["latitude"]){
            Session::flash('error', "Gps Tidak Aktif!");
            return redirect()->back();
        }
        if (hitungJarak(-1.0321232, 101.673908, $data["latitude"], $data["longitude"]) > 0.2){
            Session::flash('error', "anda sedang tidak dalam jangkauan!");
            return redirect()->back();
        }
        $store = AbsensiGuru::create($data);
        return redirect()->back();
    }
}
