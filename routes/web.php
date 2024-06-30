<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Models\HalamanDepan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $hal_depan = HalamanDepan::first();

    return view('welcome', compact('hal_depan'));
})->name('welcome');

Route::get('/login', [LoginController::class, 'view'])->name('hal_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/edit-halaman-depan', [DashboardController::class, 'edit_hal_depan'])->name('edit_hal_depan');
    Route::post('/dashboard/edit-halaman-depan', [DashboardController::class, 'update_halaman_depan'])->name('update_halaman_depan');
});
