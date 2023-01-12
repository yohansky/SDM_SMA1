<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\Agama;
use App\Models\hr\Karyawan;
use Session;

class AgamaController extends Controller
{
    //menampilkan view halaman agama 
    public function index(){
        $data = Agama::all();
        return view("dashboard.pages.master.agama.index")->with(["agama" => $data]);
    }

    public function showKaryawan($agama){
        $data = Karyawan::whereRelation("getAgama", "name", $agama)->get();
        return view("dashboard.pages.master.agama.show")->with(["karyawan" => $data, "agama" => $agama]);
    }

    // logic input data agama 
    public function store(Request $req){
        $data = $req->all();
        $data["id"] = buat_id("A", 3, Agama::class);
        $store = Agama::create($data);
        if ($store){
            Session::flash('berhasil', "Data Agama Berhasil di Input!");
        }else{
            Session::flash('error', "Data Agama Gagal Di Input!");
        }
        return redirect()->back();
    }

    // logic hapus data 
    public function destroy($id){
        $delete  = Agama::destroy($id);
        if ($delete){
            Session::flash('berhasil', "Data Berhasil DiHapus!");
        }else{
            Session::flash('error', "Data Gagal DiHapus!");
        }
        return redirect()->back();
    }

    // menampilkan view edit 
    public function edit($id){
        $agama = Agama::find($id);
        return view("dashboard.pages.master.agama.edit")->with(["agama" => $agama]);
    }

    public function update(Request $req, $id){
        $update = Agama::find($id)->update($req->all());
        if ($update){
            Session::flash('berhasil', "Data Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Data Gagal DiUpdate!");
        }

        return redirect()->back();
    }
}
