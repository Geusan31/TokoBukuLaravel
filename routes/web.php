<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardBukuController;

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

Route::get('/', function () {
    return view('depan.index', [
        'title' => 'Home',
    ]);
});

Route::get('/about', function () {
    return view('depan.about', [
        'title' => 'About'
    ]);
});

Route::get('/buku',[BukuController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::group(['middleware' => ['auth', 'cekLevel:admin,manager,kasir']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/transaksi', TransaksiController::class);
    
    Route::get('/dashboard/laporan', [LaporanController::class, 'index']);
    Route::get('/dashboard/laporan/cetak', [LaporanController::class, 'cetak']);
});
Route::group(['middleware' => ['auth', 'cekLevel:admin,manager']], function() {
    Route::resource('/dashboard/buku', DashboardBukuController::class);
});
