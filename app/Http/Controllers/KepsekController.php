<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use Session;
use Auth;
use PDF;

class KepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rekomendasi::orderBy("id","asc")->get();
        return view("dashboard.pages.kepsek.index")->with(["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function requestRekomendasi(){
        $data = Rekomendasi::where("nik", Auth()->user()->nik)->get();
        return view("dashboard.pages.rekomendasi.form")->with(["data" => $data]);
    }

    public function storeRequest(Request $req){
        $data = $req->all();
        $data["status"] = "Menunggu";
        $data["nik"] = Auth()->user()->nik;
        $store = Rekomendasi::create($data);
        if ($store->exists){
            Session::flash('berhasil', "Pengajuan Rekomendasi Berhasil Dikirim!");
        }else{
            Session::flash('error', "Gagal Mengirim Form");
        }
        return redirect()->back();
    }

    public function changeRekomendasiStatus($id,$status){
        Rekomendasi::find($id)->update([
            "status" => $status,
        ]);

        return redirect()->back();
    }

    public function generateSurat($id){

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'karyawan' => Rekomendasi::with("nikInfo.getJabatan")->find($id)
        ];

        $pdf = PDF::loadView('dashboard.pages.kepsek.pdfrekomendasi', $data);

        return $pdf->download('suratrekomendasi.pdf');
    }
}
