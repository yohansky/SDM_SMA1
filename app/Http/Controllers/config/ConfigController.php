<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config\Config;
use Session;

class ConfigController extends Controller
{
    // menampilkan view config
    public function index(){
        $data = Config::all();
        return view("dashboard.pages.config.index")->with(["config" => $data]);
    }

    // upload logo 
    public function uploadLogo(Request $req){
        $logo = $req->file('logo')->store(
            'assets/logo', 'public'
        );
        $update = Config::find(1)->update(
            ["logo" => $logo]
        );
        if ($update){
            Session::flash('berhasil', "Logo Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Logo Gagal DiUpdate!");
        }

        return redirect()->back();
    }

    // ubah tanggal gajian 
    public function editTanggalgajian(Request $req){
        $update = Config::find(1)->update(["tgl_gajian" => $req->tgl_gajian]);
        if ($update){
            Session::flash('berhasil', "Tanggal Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Tanggal Gagal DiUpdate!");
        }

        return redirect()->back();
    }

    // ubah waktu absen 
    public function editWaktuAbsen(Request $req){
        $update = Config::find(1)->update([
            "waktu_mulai_absen_staff" => $req->mulai, 
            "waktu_selesai_absen_staff" => $req->selesai 
        ]);
        if ($update){
            Session::flash('berhasil', "Waktu Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Waktu Gagal DiUpdate!");
        }

        return redirect()->back();
    }

    public function changeStatusPenilaian(Request $req){
     
        $update = Config::find(1)->update(["penilaian_sejawat" => $req->status]);
        if ($update){
            Session::flash('berhasil', "Penilaian Sejawat Telah ".$req->status."!");
        }else{
            Session::flash('error', "Gagal ".$req->status."Penilian Sejawat");
        }

        return redirect()->back();
    }
}
