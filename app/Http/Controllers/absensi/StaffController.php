<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\absensi\AbsensiStaff;
use App\Models\hr\Karyawan;
use Illuminate\Http\Request;
use Auth;
use Session;

class StaffController extends Controller
{
    //
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $data = AbsensiStaff::where("K_NIK", Auth()->user()->nik)->get();
        $eli = AbsensiStaff::where("K_NIK", Auth()->user()->nik)->where("tanggal", date("d/m/Y"))->count();
        $eli2 = AbsensiStaff::where("K_NIK", Auth()->user()->nik)->where("tanggal", date("d/m/Y"))->where("jam_absen_keluar","!=", NULL)->count();
        return view("dashboard.pages.absensi.staff.index")->with(["riwayat" => $data, "eli" => $eli, "eli2" => $eli2]);
    }

    public function store(Request $req){

        date_default_timezone_set('Asia/Jakarta');

        $data["K_NIK"] = Auth()->user()->nik;
        $data["tanggal"] = date("d/m/Y");
        $data["status"] = "Masuk";
        $data["jam_absen_masuk"] = date("h:i");
        $data["long"] = $req->longitude;
        $data["lat"] = $req->latitude;

        if ($data["status"] == "Masuk"){
            if (!$data["long"] || !$data["lat"]){
                Session::flash('error', "Gps Tidak Aktif!");
                return redirect()->back();
            }
    
            if (hitungJarak(-1.0321232, 101.673908, $data["lat"], $data["long"]) > 0.2){
                Session::flash('error', "anda sedang tidak dalam jangkauan!");
                return redirect()->back();
            }
        }

        $store = AbsensiStaff::create($data);

        return redirect()->back();

    }

    public function update(){
        date_default_timezone_set('Asia/Jakarta');

        $update = AbsensiStaff::update([
            "jam_absen_keluar" => date("h:i")
        ]);

        return redirect()->back();
    }

    public function adminIndex(){
        $karyawan = Karyawan::with(["Absensi"])->where("jabatan","!=","J000")->Where("Jabatan","!=", "J001")->orderBy("NIK", "DESC")->get();
        return view("dashboard.pages.absensi.staff.adminindex")->with(["karyawan" => $karyawan]);
    }
    
}
