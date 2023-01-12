<?php 

use App\Models\config\Config;
use App\Models\master\Jabatan;
use App\Models\hr\Karyawan;
use App\Models\master\Agama;
use App\Models\pembelajaran\Pelajaran;
use App\Models\pembelajaran\Kelas;
use App\Models\sejawat\PenilaianModel;
use App\Models\sertifikat;
use App\Models\absensi\AbsensiStaff;


function buat_id($inisial, $digit, $model, $field = "id"){
    $data = $model::select($field)->limit(1)->orderBy($field, "desc")->get();
    
    if (count($data) > 0){
        $inisial =  substr($data[0]->id, 0, strlen($inisial));
        $uid = (int)substr($data[0]->id, strlen($inisial));
        
        // concate inisial dan uid
        $id = $inisial.str_pad((int)++$uid, $digit, '0', STR_PAD_LEFT);        
        return $id;
    }else {
        // generate string angka sesuai panjang yang di tentukan
        $id = $inisial.str_pad(1, $digit, '0', STR_PAD_LEFT);
        return $id;
    }
}

function getLogo(){
    $data = Config::all();
    return $data[0]["logo"];
}

function getJamAbsen(){
    $data = Config::select(["waktu_mulai_absen_staff", "waktu_selesai_absen_staff"])->get();
    return $data;
}
function getSejawat(){
    $data = Config::select(["penilaian_sejawat"])->get();
    return $data;
}

function getAgama(){
    $data = Agama::all();
    return $data;
}

function getPointPresence($nik){
    $count =  AbsensiStaff::where("K_NIK", $nik)->where("status" , "Masuk")->whereMonth('created_at', date('m'))->count();
    $point = $count / 100;
    $point *= 70;
    return $point;
}

function getJabatan(){
    $data = Jabatan::all();
    return $data;
}

function getGuru(){
    $data = Karyawan::whereRelation("Guru","name", "Like", "%Guru%")->orderBy("nama", "asc")->get();
    return $data;
}

function getGuruExceptMe(){
    $data = Karyawan::whereRelation("Guru","name", "Like", "%Guru%")->where("NIK", "!=", Auth()->user()->nik)->orderBy("nama", "asc")->get();
    return $data;
}

function getKaryawanExceptHonorer(){
    return Karyawan::where("jabatan", "!=", "J000")->get();
}
function getKaryawan(){
    return Karyawan::all();
}

function cekSertif($nik){
    return sertifikat::where("nik", $nik)->count();
    
}

function getPelajaran(){
    $data = Pelajaran::all();
    return $data;
}

function getKelas(){
    $data = Kelas::orderBy("kelas", "asc")->get();
    return $data;
}

function listHari(){
    $hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    return $hari;
}

function getHari($id){
    $hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    return $hari[$id-1];
}

function createKaryawanPassword($ttl){
    $tglLahirRaw = explode(",",$ttl);//["kota", "01/01/2000"]
    $getDate = explode("/",$tglLahirRaw[1]);//[01,01,2000]
    $password = Bcrypt(implode("",$getDate));

    return $password;

}

function getRataRataPenilaian($nik){
    $rerata = PenilaianModel::where("nik_dinilai",$nik)->pluck("nilai")->avg();
    return $rerata;
}

function hitungJarak($lat_pusat, $long_pusat, $lat_sekarang, $long_sekarang, $unit="km", $desimal=2){
    $derajat = rad2deg(acos((sin(deg2rad($lat_pusat))*sin(deg2rad($lat_sekarang))) + (cos(deg2rad($lat_pusat))*cos(deg2rad($lat_sekarang))*cos(deg2rad($long_pusat-$long_sekarang)))));
    switch($unit) {
        case 'km':
         $jarak = $derajat * 111.13384; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
         break;
        case 'mi':
         $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
         break;
        case 'nmi':
         $jarak =  $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
       }
    return round($jarak, $desimal);
    
}

?>