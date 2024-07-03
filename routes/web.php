<?php

use App\Models\Service;
use App\Models\Testimoni;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\HalamanDepan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Models\back_image_testi;
use App\Models\KontenPortofolio;

Route::get('/', function () {

    $hal_depan = HalamanDepan::first();
    $data_pendidikan = Pendidikan::all()->sortByDesc('tahun');
    $data_pengalaman = Pengalaman::all()->sortByDesc('tahun');
    $services = Service::all();
    $testimoni = Testimoni::all();
    $image_testi = back_image_testi::first();
    $portofolio = KontenPortofolio::with('jenis')->get();
    $kategori_jenis = $portofolio->pluck('jenis')->unique('nama_class');
    // dd($portofolio);
    return view('welcome', compact('hal_depan', 'data_pendidikan', 'data_pengalaman', 'services', 'testimoni', 'image_testi'
                    , 'portofolio', "kategori_jenis"));

})->name('welcome');

Route::get('/login', [LoginController::class, 'view'])->name('hal_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/edit-halaman-depan', [DashboardController::class, 'edit_hal_depan'])->name('edit_hal_depan');
    Route::post('/dashboard/edit-halaman-depan', [DashboardController::class, 'update_halaman_depan'])->name('update_halaman_depan');

    Route::get('/dashboard/edit-ex', [DashboardController::class, 'edit_ex'])->name('edit_ex');
    Route::get('/dashboard/edit-ex/show-detail-ex/{id}/{tipeform}', [DashboardController::class, 'show_detail_ex'])->name('show_detail_ex');
    Route::post('/dashboard/tambah-pendidikan', [DashboardController::class, 'tambah_pendidikan'])->name('tambah_pendidikan');
    Route::put('/dashboard/edit-pendidikan/{id}', [DashboardController::class, 'edit_pendidikan'])->name('edit_pendidikan');
    Route::put('/dashboard/edit-pengalaman/{id}', [DashboardController::class, 'edit_pengalaman'])->name('edit_pengalaman');
    Route::post('/dashboard/tambah-pengalaman', [DashboardController::class, 'tambah_pengalaman'])->name('tambah_pengalaman');
    Route::delete('/dashboard/delete-pendidikan/{id}', [DashboardController::class, 'delete_pendidikan'])->name('delete_pendidikan');
    Route::delete('/dashboard/delete-penngalaman/{id}', [DashboardController::class, 'delete_pengalaman'])->name('delete_pengalaman');

    Route::get('/dashboard/edit-services', [DashboardController::class, 'edit_services'])->name('edit_services');
    Route::post('/dashboard/tambah-services', [DashboardController::class, 'tambah_services'])->name('tambah_services');
    Route::get('/dashboard/show-details-service/{id}', [DashboardController::class, 'show_details_service'])->name('show_details_service');
    Route::put('/dashboard/edit-details-service/{id}', [DashboardController::class, 'edit_details_service'])->name('edit_details_service');
    Route::delete('/dashboard/delete-details-service/{id}', [DashboardController::class, 'delete_details_service'])->name('delete_details_service');


    Route::get('/dashboard/edit-testimoni', [DashboardController::class, 'edit_testimoni'])->name('edit_testimoni');
    Route::get('/dashboard/edit-testimoni/show-detail-testimoni/{id}', [DashboardController::class, 'show_detail_testimoni'])->name('show_detail_testimoni');
    Route::put('/dashboard/edit-testimoni/edit-detail-testimoni/{id}', [DashboardController::class, 'edit_detail_testimoni'])->name('edit_detail_testimoni');
    Route::delete('/dashboard/edit-testimoni/delete-testimoni/{id}', [DashboardController::class, 'delete_testimoni'])->name('delete_testimoni');
    Route::post('/dashboard/edit-gambar-testimoni', [DashboardController::class, 'edit_gambar_testimoni'])->name('edit_gambar_testimoni');
    Route::post('/dashboard/tambah-testimoni', [DashboardController::class, 'tambah_testimoni'])->name('tambah_testimoni');

    Route::get('/dashboard/edit-portofolio', [DashboardController::class, 'edit_portofolio'])->name('edit_portofolio');
    Route::post('/dashboard/edit-portofolio/tambah-kategori', [DashboardController::class, 'tambah_kategori_portofolio'])->name('tambah_kategori_portofolio');
    Route::post('/dashboard/edit-portofolio/tambah-konten', [DashboardController::class, 'tambah_konten_portofolio'])->name('tambah_konten_portofolio');
    Route::put('/dashboard/edit-portofolio/edit-detail-kategori/{id}', [DashboardController::class, 'edit_detail_kategori_portofolio'])->name('edit_detail_kategori_portofolio');
    Route::put('/dashboard/edit-portofolio/edit-detail-konten/{id}', [DashboardController::class, 'edit_detail_konten_portofolio'])->name('edit_detail_konten_portofolio');
    Route::delete('/dashboard/edit-portofolio/delete-kategori/{id}', [DashboardController::class, 'delete_kategori_portofolio'])->name('delete_kategori_portofolio');
    Route::delete('/dashboard/edit-portofolio/delete-konten/{id}', [DashboardController::class, 'delete_konten_portofolio'])->name('delete_konten_portofolio');

});
