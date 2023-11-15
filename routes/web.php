<?php

use App\Http\Controllers\adminAccountController;
use App\Http\Controllers\adminPortoController;
use App\Http\Controllers\portofolioPage_controller;
use App\Http\Controllers\publicPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// PUBLIC
Route::get('/homescreen', [publicPageController::class, 'homescreen'])->name('public.homescreen');
Route::get('/showcase', [publicPageController::class, 'showcase'])->name('public.showcase');
Route::get('/login', [publicPageController::class, 'login'])->name('public.login');
Route::get('/portofolio', [publicPageController::class, 'portofolio'])->name('public.portofolio');
Route::get('/team', [publicPageController::class, 'team'])->name('public.team');


// ADMIN
Route::get('/', [adminAccountController::class, 'index'])->name('account.index');
Route::get('/kelolaakun/posts', [adminAccountController::class, 'create'])->name('account.create');
Route::post('/kelolaakun/store', [adminAccountController::class, 'store'])->name('account.store');
Route::get('/kelolaakun/destroy/{id}', [adminAccountController::class, 'destroy'])->name('account.destroy');
Route::get('/kelolaakun/show/{id}', [adminAccountController::class, 'show'])->name('account.show');
Route::get('/kelolaakun/edit_akun/{id}', [adminAccountController::class, 'edit_akun'])->name('account.edit_akun');
Route::get('/kelolaakun/edit_profil/{id}', [adminAccountController::class, 'edit_profil'])->name('account.edit_profil');
Route::post('/kelolaakun/update_akun/{id}', [adminAccountController::class, 'update_akun'])->name('account.update_akun');
Route::post('/kelolaakun/update_profil/{id}', [adminAccountController::class, 'update_profil'])->name('account.update_profil');

Route::get('/1', [adminPortoController::class, 'showAccounts'])->name('proyek.pilih_akun');
Route::get('/kelolaproyek/pilih_akun/{id}', [adminPortoController::class, 'lihatKonten'])->name('proyek.lihat_projek');
Route::get('/proyek/tambah_proyek/{id}', [adminPortoController::class, 'tambahProjek'])->name('proyek.tambah_projek');
Route::post('/kelolaproyek/pilih_akun/simpan_data_projek/{id}', [adminPortoController::class, 'simpanDataProjek'])->name('proyek.simpan_data_projek');

Route::get('/kelolaproyek/pilih_akun/lihat_detail/{id}', [adminPortoController::class, 'lihatDetail'])->name('proyek.lihat_detail');
Route::get('/kelolaproyek/pilih_akun/edit_projek/{id}', [adminPortoController::class, 'editProjek'])->name('proyek.edit_projek');
Route::post('/kelolaproyek/pilih_akun/update_projek/{id}', [adminPortoController::class, 'updateProjek'])->name('proyek.update_projek');

Route::get('/kelolaproyek/pilih_akun/hapus_projek/{id}', [adminPortoController::class, 'hapusProjek'])->name('proyek.hapus_projek');

?>