<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\Pengguna_layananController;
use App\Http\Controllers\Penyedia_layananController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('/cek', DashboardController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/', DashboardController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard', DashboardController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/penyedia_layanan', Penyedia_layananController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/pengguna_layanan', Pengguna_layananController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/ketersediaan', KetersediaanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/layanan', LayananController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/pendaftaran', PendaftaranController::class);

Route::post('getkabupaten', [IndoregionController::class, 'kabupaten'])->name('getkabupaten');
