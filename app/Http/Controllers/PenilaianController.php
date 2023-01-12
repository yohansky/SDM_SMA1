<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hr\Karyawan;
use App\Models\sejawat\PenilaianModel;
use App\Models\sejawat\RincianModel;
use App\Models\Plotting;
use App\Models\sertifikat;
use Auth;

class PenilaianController extends Controller
{
    //
    public function index(){
        $guru = Karyawan::with(["getPenilaian"])->whereRelation("getPenilaian", "nik_dinilai", "=", Auth()->user()->nik)->whereRelation("Guru","name", "Like", "%Guru%")->where("NIK", "!=", Auth()->user()->nik)->orderBy("nama", "asc")->get();
        $plotting = Plotting::where("NIK_penilai", Auth()->user()->nik)->get();
        $rerata = PenilaianModel::where("nik_dinilai", Auth()->user()->nik)->pluck("nilai")->avg();
        return view("dashboard.pages.sejawat.index")->with(["guru" => $guru,"rerata" => $rerata, "plotting" => $plotting]);
    }

    public function storeSertif(Request $req){
        sertifikat::create($req->all());
        return redirect()->back();
    }

    public function sertif(){
        return view("sertif")->with(["data" => sertifikat::all()]);
    }

    public function form($nik, $plotid){
        return view("dashboard.pages.sejawat.form")->with(["nik" => $nik, "plotid" => $plotid]);
    }

    public function postForm(Request $req, $plotid){
        $data = $req->all();
        $subtotal = $data["pilihan_1"] + $data["pilihan_2"] + $data["pilihan_3"] + $data["pilihan_4"] + $data["pilihan_5"] + $data["pilihan_6"] + $data["pilihan_7"] + $data["pilihan_8"] + $data["pilihan_9"] + $data["pilihan_10"] +$data["pilihan_11"] +$data["pilihan_12"] + $data["pilihan_13"] + $data["pilihan_14"];
        $total = ($subtotal * 100) / 56;
        $data["nik_penilai"] = Auth()->user()->nik;

        $store = PenilaianModel::create([
            "nik_penilai" => $data["nik_penilai"],
            "nik_dinilai" => $data["nik_dinilai"],
            "nilai" => $total,
        ]);

        if($store){
            RincianModel::create([
                "penilaian_id" => $store->id,
                "pilihan_1" => $data["pilihan_1"],
                "pilihan_2" => $data["pilihan_2"],
                "pilihan_3" => $data["pilihan_3"],
                "pilihan_4" => $data["pilihan_4"],
                "pilihan_5" => $data["pilihan_5"],
                "pilihan_6" => $data["pilihan_6"],
                "pilihan_7" => $data["pilihan_7"],
                "pilihan_8" => $data["pilihan_8"],
                "pilihan_9" => $data["pilihan_9"],
                "pilihan_10" => $data["pilihan_10"],
                "pilihan_11" => $data["pilihan_11"],
                "pilihan_12" => $data["pilihan_12"],
                "pilihan_13" => $data["pilihan_13"],
                "pilihan_14" => $data["pilihan_14"],
            ]);

            Plotting::where("id", $plotid)->update([
                "status" => "Sudah"
            ]);
        }

        return redirect()->back();

    }
}
