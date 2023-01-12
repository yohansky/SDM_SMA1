<?php

namespace App\Http\Controllers\pembelajaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pembelajaran\Kelas;
use App\Models\hr\Karyawan;

use Session;

class KelasController extends Controller
{
    //
    public function index(){
        $data = Kelas::all();
        return view("dashboard.pages.pembelajaran.kelas.index")->with(["kelas" => $data]);
    }

    public function store(Request $req){
        $store = Kelas::create($req->all());
        
        if ($store){
            Session::flash('berhasil', "Data Kelas Berhasil di Input!");
        }else{
            Session::flash('error', "Data Kelas Gagal Di Input!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $kelas = Kelas::find($id);
        return view("dashboard.pages.pembelajaran.kelas.edit")->with(["kelas" => $kelas]);
    }

    public function update(Request $req, $id){
        $update = Kelas::find($id)->update($req->all());
        if ($update){
            Session::flash('berhasil', "Data Berhasil DiUpdate!");
        }else{
            Session::flash('error', "Data Gagal DiUpdate!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $delete  = Kelas::destroy($id);
        if ($delete){
            Session::flash('berhasil', "Data Berhasil DiHapus!");
        }else{
            Session::flash('error', "Data Gagal DiHapus!");
        }
        return redirect()->back();
    }
}
