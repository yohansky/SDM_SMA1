<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hr\Karyawan;
use App\Models\master\Jabatan;
use App\Models\User;
use Illuminate\Support\Str;
use Session;

class KaryawanController extends Controller
{
    //
    public function index(){
        $data = Karyawan::with("getJabatan")->get();
        return view("dashboard.pages.humanR.karyawan.index")->with(["karyawan" => $data ]);
    }

    public function store(Request $req){
        $data = $req->all();
        $data["status"] = "Aktif";
        $data["tempat_tgl_lahir"] = $data["tempat_"].",".$data["tgl_lahir"];
        $data["photo"] = $req->file('photo')->store(
            'assets/karyawan', 'public'
        );
        $store = Karyawan::create($data);
        if ($store->exists){
            $this->createUserKaryawan($store);
            Session::flash('berhasil', "Data Karyawan Berhasil Ditambahkan!");
        }else{
            Session::flash('error', "Data Karyawan Gagal Ditambahkan!");
        }

        return redirect()->back();
    }

    public function createUserKaryawan($req){
        
        $password = createKaryawanPassword($req->tempat_tgl_lahir);
        
        $jabatan = Jabatan::find($req->jabatan);

        if (explode(" ", strtolower($jabatan->name))[0] == "guru" ){
            $role = "Guru";
        } else { 
            $role = "Staff";
        }
        $remember_token = str::random(60);

        User::create([
            "name" => $req->nama,
            "email" => $req->email,
            "password" => $password,
            "role" => $role,
            "nik" => $req->NIK,
            "remember_token" => $remember_token,
        ]);

    }

    

    public function destroy($id){
        $delete = Karyawan::where("NIK", $id)->delete();
        if ($delete){
            Session::flash('berhasil', "Data Karyawan Berhasil Dihapus!");
        }else{
            Session::flash('error', "Data Karyawan Gagal Dihapus!");
        }

        return redirect()->back();

    }

    public function edit($id){
        $data = Karyawan::where("NIK", $id)->limit(1)->get();
        return view("dashboard.pages.humanR.karyawan.edit")->with(["karyawan" => $data]);
    }

    public function update(Request $req, $id){
        $update = Karyawan::where("NIK", $id)->update($req->except(['_token', '_method']));
        if ($update){
            $this->editRoleUser($id, $req->only("jabatan"));
            Session::flash('berhasil', "Data Karyawan Berhasil Diupdate!");
        }else{
            Session::flash('error', "Data Karyawan Gagal Diupdate!");
        }

        return redirect()->back();

    }

    public function editRoleUser($id, $input){
        
        $jabatan = Jabatan::find($input["jabatan"]);

        if (explode(" ", strtolower($jabatan->name))[0] == "guru" ){
            $role = "Guru";
        } else { 
            $role = "Staff";
        }

        User::where("NIK", $id)->update([
            "role" => $role,
        ]);
    }


}