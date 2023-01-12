<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\jabatan;
use App\Models\hr\Karyawan;
use Illuminate\Database\Eloquent\Builder;
use Session;

class JabatanController extends Controller
{
    // menampilkan view halaman buat jabatan
    public function index(){
        $data = Jabatan::all();
        return view('dashboard.pages.master.jabatan.index')->with(['jabatan' => $data]);
    }

    public function showKaryawan($jabatan){
        $data = Karyawan::whereRelation("getJabatan", "name", $jabatan)->get();
        return view("dashboard.pages.master.jabatan.show")->with(["karyawan" => $data, "jabatan" => $jabatan]);
    }

    // logic untuk input data jabatan
    public function store(Request $req){
        $data = $req->all();
        $data["id"] = buat_id("J", 3, Jabatan::class);
        $store = Jabatan::create($data);
        if ($store){
            Session::flash('berhasil', "Data Jabatan Berhasil di Input!");
        }else{
            Session::flash('error', "Data jabatan Gagal Di Input!");
        }
        return redirect()->back();
    }

    // logic untuk hapus data jabatan
    public function destroy($id){
        $delete  = Jabatan::destroy($id);
        if ($delete){
            Session::flash('berhasil', "Data Berhasil DiHapus!");
        }else{
            Session::flash('error', "Data Gagal DiHapus!");
        }
        return redirect()->back();
    }

    // menampilkan view edit jabatan
    public function edit($id){
        $data = Jabatan::find($id);
        return view("dashboard.pages.master.jabatan.edit")->with(["jabatan"=>$data]);
    }

    // logic untuk update data jabatan
    public function update(Request $req, $id){
        $update = Jabatan::find($id)->update($req->all());
        if ($update){
            Session::flash('berhasil', "Data Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Data Gagal DiUpdate!");
        }

        return redirect()->back();
    }
}
