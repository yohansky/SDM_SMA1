<?php

namespace App\Http\Controllers\pembelajaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pembelajaran\Pelajaran;
use Session;

class PelajaranController extends Controller
{
    //
    public function index(){
        $data = Pelajaran::all();
        return view("dashboard.pages.pembelajaran.pelajaran.index")->with(["mapel" => $data]);
    }

    public function store(Request $req){
        $data = $req->all();
        $data["kode_mapel"] = buat_id("M", 3, Pelajaran::class, "kode_mapel");
        $store = Pelajaran::create($data);
        if ($store){
            Session::flash('berhasil', "Data Pelajaran Berhasil di Input!");
        }else{
            Session::flash('error', "Data Pelajaran Gagal Di Input!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $data = Pelajaran::where("kode_mapel", $id)->get();
        return view("dashboard.pages.pembelajaran.pelajaran.edit")->with(["mapel" => $data]);
    }

    public function update(Request $req, $id){
        $update = Pelajaran::where("kode_mapel", $id)->update($req->all());
        if ($update){
            Session::flash('berhasil', "Data Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Data Gagal DiUpdate!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $delete  = Pelajaran::where("kode_mapel", $id)->delete();
        if ($delete){
            Session::flash('berhasil', "Data Berhasil DiHapus!");
        }else{
            Session::flash('error', "Data Gagal DiHapus!");
        }
        return redirect()->back();

    }
}
