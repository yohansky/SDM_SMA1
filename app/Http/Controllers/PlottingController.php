<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plotting;

class PlottingController extends Controller
{
    //
    public function index(){
        return view("dashboard.pages.plotting.index")->with(["data" => Plotting::all()]);
    }

    public function store(Request $req){
        $data = $req->all();
        $data["status"] = "Belum";
        Plotting::create($data);
        return redirect()->back();
    }
}
