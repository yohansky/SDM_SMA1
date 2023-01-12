<?php

namespace App\Http\Controllers\pembelajaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pembelajaran\Jadwal;
use Session;

class JadwalController extends Controller
{
    //
    public function index(){
        $data = Jadwal::with(["getKaryawan", "getMapel"])->orderBy("mapel", "asc")->get();
        return view("dashboard.pages.pembelajaran.jadwal.index")->with(["jadwal" => $data]);
    }

    public function store(Request $req){
        $store = Jadwal::create($req->all());
        if ($store){
            Session::flash('berhasil', "Data Jadwal Berhasil di Input!");
        }else{
            Session::flash('error', "Data Jadwal Gagal Di Input!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $jadwal = Jadwal::find($id);
        return view("dashboard.pages.pembelajaran.jadwal.edit")->with(["jadwal" => $jadwal]);
    }

    public function update(Request $req, $id){
        $update = Jadwal::find($id)->update($req->all());
        if ($update){
            Session::flash('berhasil', "Data Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Data Gagal DiUpdate!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $delete  = Jadwal::destroy($id);
        if ($delete){
            Session::flash('berhasil', "Data Berhasil DiHapus!");
        }else{
            Session::flash('error', "Data Gagal DiHapus!");
        }
        return redirect()->back();
    }
}
