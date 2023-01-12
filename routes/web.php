<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master\JabatanController;
use App\Http\Controllers\master\AgamaController;
use App\Http\Controllers\config\ConfigController;
use App\Http\Controllers\hr\KaryawanController;
use App\Http\Controllers\pembelajaran\JadwalController;
use App\Http\Controllers\pembelajaran\KelasController;
use App\Http\Controllers\pembelajaran\PelajaranController;
use App\Http\Controllers\absensi\StaffController;
use App\Http\Controllers\absensi\GuruController;
use App\Http\Controllers\lowongan\LowonganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PlottingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/login", [AuthController::Class, "index"])->name("login");


// ? Middleware Route Admin

Route::middleware(["auth", "checkRole:Admin"])->group(function(){
    Route::get('/', function () {
        return redirect()->route("jabatan.index");
    });

    // ? Route Menu Master 

    // ! Route Jabatan
    Route::get('/master/jabatan', [JabatanController::Class, "index"])->name("jabatan.index");
    Route::get('/master/jabatan/{id}/edit', [JabatanController::Class, "edit"])->name("jabatan.edit");
    Route::get('/master/jabatan/{jabatan}/karyawan/', [JabatanController::Class, "showKaryawan"])->name("jabatan.show.karyawan");
    Route::put('/master/jabatan/{id}/update', [JabatanController::Class, "update"])->name("jabatan.update");
    Route::post("/master/jabatan/store", [JabatanController::class, "store"])->name("jabatan.store");
    Route::delete('/master/jabatan/{id}/delete', [JabatanController::Class, "destroy"])->name("jabatan.delete");

    // ! Route Agama 
    Route::get("/master/agama", [AgamaController::Class, "index"])->name("agama.index");
    Route::get("/master/agama/{id}/edit", [AgamaController::class, "edit"])->name("agama.edit");
    Route::get("/master/agama/{agama}/karyawan/",[AgamaController::class, "showKaryawan"])->name("agama.show.karyawan");
    Route::put("/master/agama/{id}/update", [AgamaController::class, "update"])->name("agama.update");
    Route::post("/master/agama/post", [AgamaController::class, "store"])->name("agama.store");
    Route::delete("/master/agama/{id}/delete", [AgamaController::class, "destroy"])->name("agama.delete");

    // // ? Route Menu Master 

    // // ! Route Jabatan
    // Route::get('/master/jabatan', [JabatanController::Class, "index"])->name("jabatan.index");
    // Route::get('/master/jabatan/{id}/edit', [JabatanController::Class, "edit"])->name("jabatan.edit");
    // Route::put('/master/jabatan/{id}/update', [JabatanController::Class, "update"])->name("jabatan.update");
    // Route::post("/master/jabatan/store", [JabatanController::class, "store"])->name("jabatan.store");
    // Route::delete('/master/jabatan/{id}/delete', [JabatanController::Class, "destroy"])->name("jabatan.delete");

    // // ! Route Agama 
    // Route::get("/master/agama", [AgamaController::Class, "index"])->name("agama.index");
    // Route::get("/master/agama/{id}/edit", [AgamaController::class, "edit"])->name("agama.edit");
    // Route::put("/master/agama/{id}/update", [AgamaController::class, "update"])->name("agama.update");
    // Route::post("/master/agama/post", [AgamaController::class, "store"])->name("agama.store");
    // Route::delete("/master/agama/{id}/delete", [AgamaController::class, "destroy"])->name("agama.delete");

    // ? Route Menu Config
    Route::get("/config", [ConfigController::class, "index"])->name("config.index");
    Route::put("/config/logo/upload", [ConfigController::class, "uploadLogo"])->name("config.logo");
    Route::put("/config/tanggal/edit", [ConfigController::class, "editTanggalGajian"])->name("config.tanggal");
    Route::put("/config/absen/edit",[ConfigController::Class, "editWaktuAbsen"])->name("config.absen");
    Route::put("/config/penilaian_status/edit",[ConfigController::Class, "changeStatusPenilaian"])->name("config.penilaian.update");

    // ? Route Menu HR
    // ! Route Karyawan 
    Route::get("/HR/karyawan", [KaryawanController::class, "index"])->name("karyawan.index");
    Route::post("/HR/karyawan/store", [KaryawanController::class, "store"])->name("karyawan.store");
    Route::delete("/HR/karyawan/{id}/delete", [KaryawanController::class, "destroy"])->name("karyawan.destroy");
    Route::get("/HR/karyawan/{id}/edit", [KaryawanController::class, "edit"])->name("karyawan.edit");
    Route::put("/HR/karyawan/{id}/update", [KaryawanController::class, "update"])->name("karyawan.update");

    // ? Route Menu Pembelajaran
    // ! Route Kelas 
    Route::get("/pembelajaran/kelas", [KelasController::class, "index"])->name("kelas.index");
    Route::post("/pembelajaran/kelas/store", [KelasController::class, "store"])->name("kelas.store");
    Route::delete("/pembelajaran/kelas/{id}/delete", [KelasController::class, "destroy"])->name("kelas.destroy");
    Route::get("/pembelajaran/kelas/{id}/edit", [KelasController::class, "edit"])->name("kelas.edit");
    Route::put("/pembelajaran/kelas/{id}/update", [KelasController::class, "update"])->name("kelas.update");

    // ! Route Pelajaran
    Route::get("/pembelajaran/pelajaran", [PelajaranController::class, "index"])->name("pelajaran.index");
    Route::post("/pembelajaran/pelajaran/store", [PelajaranController::class, "store"])->name("pelajaran.store");
    Route::delete("/pembelajaran/pelajaran/{id}/delete", [PelajaranController::class, "destroy"])->name("pelajaran.destroy");
    Route::get("/pembelajaran/pelajaran/{id}/edit", [PelajaranController::class, "edit"])->name("pelajaran.edit");
    Route::put("/Pembelajaran/pelajaran/{id}/update", [PelajaranController::class, "update"])->name("pelajaran.update");

    // ! Route Jadwal
    Route::get("/pembelajaran/jadwal", [JadwalController::class, "index"])->name("jadwal.index");
    Route::post("/pembelajaran/jadwal/store", [JadwalController::class, "store"])->name("jadwal.store");
    Route::delete("/pembelajaran/jadwal/{id}/delete", [JadwalController::class, "destroy"])->name("jadwal.destroy");
    Route::get("/pembelajaran/jadwal/{id}/edit", [JadwalController::class, "edit"])->name("jadwal.edit");
    Route::put("/pembelajaran/jadwal/{id}/update", [JadwalController::Class, "update"])->name("jadwal.update");

    // ? Route Menu Lowongan
    // ! Route Lowongan
    Route::get("/lowongan", [LowonganController::class, "index"])->name("lowongan.index");
    Route::get("/lowongan/{id}/show", [LowonganController::class, "show"])->name("lowongan.show");
    Route::post("/lowongan/store", [LowonganController::class, "store"])->name("lowongan.store");
    Route::get("/lowongan/{id}/changeStatus/{status}", [LowonganController::class, "changeStatus"])->name("lowongan.changeStatus");
    Route::get("/lowongan/{id}/edit", [LowonganController::class, "edit"])->name("lowongan.edit");
    Route::put("/lowongan/{id}/update", [LowonganController::class, "update"])->name("lowongan.update");
    Route::get("/lowongan/{id}/applicant", [LowonganController::class, "showApplicant"])->name("lowongan.applicant.detail");
    Route::post("/lowongan/eliigble", [LowonganController::class, "eligible"])->name("lowongan.applicant.eligible");

    // ? Route Menu Absensi
    // ! Route Absensi
    Route::get("/absensi/staff/rekap", [StaffController::class, "adminIndex"])->name("absensi.admin.index");
    Route::get("/absensi/guru/rekap", [GuruController::class, "Index"])->name("absensi.guru.index");
    Route::get("/absensi/guru/{id}/rekap", [GuruController::class, "listJadwal"])->name("absensi.guru.jadwal");
   
    Route::post("/absensi/guru/post", [GuruController::class, "postAbsen"])->name("absensi.guru.post");

    //  ? Route Menu Mutasi 
    // ! Route Mutasi
    Route::get("/Mutasi/keluar", [MutasiController::class, "index_keluar"])->name("mutasi.keluar");
    Route::get("/Mutasi/pdf/{jenis}", [MutasiController::class, "generateSurat"])->name("surat.mutasi");
    Route::resource("/Mutasi", MutasiController::class);
    
    Route::get("/Plotting", [PlottingController::Class, "index"])->name("plotting.index");
    Route::post("/Plotting/store", [PlottingController::Class, "store"])->name("plotting.store");

    Route::get("/penilaian", [KepsekController::class, "index"]);
    Route::get("/sertif", [PenilaianController::class, "sertif"])->name("sertif.index");
    // ? Route Menu Pelatihan 
    // ! Route Pelatihan 
    Route::resource("/Pelatihan", PelatihanController::class);
});

// ? Route non admin
// ! Absensi Staff
Route::get("/absensi/staff", [StaffController::class, "index"])->name("absensi.staff.index");
Route::post("/absensi/staff/store", [StaffController::class, "store"])->name("absensi.staff.post");

Route::middleware(["auth", "checkRole:Guru,Staff"])->group(function(){
    Route::get("/guru/penilaian-sejawat", [PenilaianController::class, "index"])->name("penilaian.sejawat");
    Route::get("/guru/penilaian-sejawat/{nik}/{plotid}/form", [PenilaianController::class, "form"])->name("penilaian.form");
    Route::post("/guru/penilaian-sejawat/{plotid}/form", [PenilaianController::class, "postForm"])->name("penilaian.form.post");
    Route::get("/request/rekomendasi", [KepsekController::class, "requestRekomendasi"])->name("request.rekomendasi");
    Route::post("/rekomendasi/post",[KepsekController::class,"storeRequest"])->name("request.post");
    Route::get("/rekomendasi/surat/{id}", [KepsekController::class, "generateSurat"])->name("surat.rekomendasi");
    Route::post("/sertif/store", [PenilaianController::class, "storeSertif"])->name("sertif.store");
    
});

Route::middleware(["auth", "checkRole:Kepsek"])->group(function(){
    Route::resource("/kepsek", KepsekController::class);
    Route::get("/kepsek/update/{id}/rekomendasi/{status}", [KepsekController::class, "changeRekomendasiStatus"])->name("rekomendasi.update.status");
});

Route::middleware(["auth", "checkRole:Guru,Admin"])->group(function(){
    // ! Absensi Guru
    // Route::get("/absensi/guru", [GuruController::class, "index"])->name("absensi.guru.index");
    Route::get("/absensi/guru", [GuruController::class, "guruJadwal"])->name("absensi.guru");
    Route::get("/absensi/guru/{guruid}/{mapelid}", [GuruController::class, "absenJadwal"])->name("absensi.guru.absen");
});

// ! Lowongan Pekerjaan
Route::get("/karir", [LowonganController::class, "vacancies"])->name("lowongan.list");
Route::get("/karir/{id}/show", [LowonganController::class, "showVacancy"])->name("lowongan.list.show");
Route::post("/karir/apply", [LowonganController::class, "apply"])->name("lowongan.apply");



// ? Route Authentikasi 
Route::get("/login", [AuthController::Class, "index"])->name("login");
Route::get("/admin/login", [AuthController::Class, "adminLogin"])->name("login.admin");
Route::post("/login/post", [AuthController::Class, "postLogin"])->name("login.post");
Route::post("/admin/login/post", [AuthController::Class, "adminPostLogin"])->name("login.admin.post");
Route::get("/logout", [AuthController::Class, "Logout"])->name("logout");