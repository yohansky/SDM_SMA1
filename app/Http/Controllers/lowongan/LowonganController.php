<?php

namespace App\Http\Controllers\lowongan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job\Lowongan;
use App\Models\job\Applicant;

use Session;

class LowonganController extends Controller
{
    //
    public function index(){
        $data = Lowongan::all();
        return view("dashboard.pages.lowongan.index")->with(["lowongan" => $data]);
    }

    public function show($id){
        $data = Applicant::where("vacancy_id", $id)->get();
        return view("dashboard.pages.lowongan.show")->with(["applicant" => $data]);
    }

    public function store(Request $req){
        $data = $req->all();
        $data["status"] = "Open";
        Lowongan::create($data);
        return redirect()->back();

    }

    public function edit($id){
        $data = Lowongan::find($id);
        return view("dashboard.pages.lowongan.edit")->with(["lowongan" => $data]);
    }

    public function update(Request $req, $id){
        Lowongan::find($id)->update($req->all());
        return redirect()->back();
    }

    public function changeStatus($id, $status){
        Lowongan::find($id)->update(["status" => $status]);
        return redirect()->back();
    }

    public function vacancies(){
        $data = Lowongan::where("status", "Open")->get();
        return view("karir.index")->with(["lowongan" => $data]);
    }

    public function showVacancy($id){
        $data = Lowongan::find($id); 
        return view("karir.form")->with(["lowongan" => $data]);
    }

    public function showApplicant($id){
        $data = Applicant::find($id);
        return view("dashboard.pages.lowongan.detail")->with(["a" => $data]);
    }

    public function apply(Request $req){
        $data = $req->all();
        $data["tempat_tgl_lahir"] = $data["tempat_"].",".$data["tgl_lahir"];
        $data["cv"] = $req->file('cv')->store('assets/CV', 'public');
        $data["catatan"] = " ";
        $store = Applicant::create($data);
        if ($store->exists){
            Session::flash('berhasil', "Form Apply Lowongan Berhasil DIkirim, Silahkan tunggu email lanjutan!");
        }else{
            Session::flash('error', "Gagal Mengirim Form");
        }
        return redirect()->back();
    }

    public function eligible(Request $req){
        $data = $req->all();
        $data2 = Lowongan::find($data["vacancy_id"]);
        $details = [
            "jabatan" => $data2["jabatan"],
            "tanggal" => $data["tanggal"],
            "waktu" => $data["waktu"],
            "tempat" => $data["tempat"],
        ];
        
        Applicant::find($data["apl_id"])->update(["catatan" => "eligible"]);

        \Mail::to($data["email"])->send(new \App\Mail\InfoApplicantEmail($details));

        return redirect()->back();


    }
}
