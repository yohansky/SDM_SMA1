<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\hr\Karyawan;

use PDF;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("dashboard.pages.mutasi.index")->with(["mutasi" => Mutasi::with("Karyawan.getJabatan")->where("status","Masuk")->get()]);
    }

    public function index_keluar()
    {
        //
        return view("dashboard.pages.mutasi.index_keluar")->with(["mutasi" => Mutasi::with("Karyawan.getJabatan")->where("status","Keluar")->get()]);
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
        Mutasi::create($request->all());
        if ($request->status == "Masuk"){
            Karyawan::where("NIK", $request->NIK)->update(["status" => "Aktif"]);
        }else if ($request->status == "Keluar"){
            Karyawan::where("NIK", $request->NIK)->update(["status" => "Non-Aktif"]);
        }
        return redirect()->back();
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

    public function generateSurat($id, $jenis){

        if ($jenis == "masuk"){
            $data = [
                'title' => 'Mutasi Masuk',
                'mutasi' => Mutasi::with("Karyawan.getJabatan")->where("status","Masuk")->get()
            ];
        } else {
            $data = [
                'title' => 'Mutasi Keluar',
                'mutasi' => Mutasi::with("Karyawan.getJabatan")->where("status","Keluar")->get()
            ];
        }

        $pdf = PDF::loadView('dashboard.pages.mutasi.mutasi_keluarpdf', $data);

        return $pdf->download('laporan.pdf');
    }
}
