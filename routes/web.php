<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriBencanaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\KategoriBencana;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('masuk');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('daftar');

Route::resource('provinsi', ProvinsiController::class);
Route::resource('kota', KotaController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('kategori_bencana', KategoriBencanaController::class);
Route::resource('bencana', BencanaController::class);
Route::resource('pelaporan', PelaporanController::class);
Route::post('/validasi/{id}', [PelaporanController::class, 'validasi'])->name('pelaporan.validasi');
Route::post('/detail/{id}', [PelaporanController::class, 'detail'])->name('pelaporan.detail');
Route::get('/pelaporan/search', [PelaporanController::class, 'search'])->name('pelaporan.search');
Route::get('/logout', [PelaporanController::class, 'logout'])->name('logout');