<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MasyarakatController, PengaduanController, TanggapanController};

use App\Http\Controllers\HomeController;

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
  
Route::get('/', function () {
    return view('welcome');
});

Route::post('Masyarakat/registerUser', [MasyarakatController::class, 'registerUser'])->name('Masyarakat.registerUser');
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::resource('petugas', PetugasController::class);
    Route::resource('/pengaduan', PengaduanController::class);
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::resource('Masyarakat', MasyarakatController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('Tanggapan', TanggapanController::class);
Route::get('/tanggapanview', [PengaduanController::class, 'tanggapanView']);
Route::get('Masyarakat/{id}/updateStatus', [MasyarakatController::class, 'updateStatus'])->name('Masyarakat.updateStatus');
Route::get('Tanggapan/{id}/stores', [TanggapanController::class, 'stores'])->name('Tanggapan.stores');
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::get('laporan', [LaporanController::class. 'generate_pdf'])->name('laporan.pdf');
Route::resource('Masyarakat', MasyarakatController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('Tanggapan', TanggapanController::class);
Route::get('/tanggapanview', [PengaduanController::class, 'tanggapanView']);
Route::get('Masyarakat/{id}/updateStatus', [MasyarakatController::class, 'updateStatus'])->name('Masyarakat.updateStatus');
Route::get('Tanggapan/{id}/stores', [TanggapanController::class, 'stores'])->name('Tanggapan.stores');
Route::middleware(['auth', 'user-access:manager'])->group(function () {
   Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
