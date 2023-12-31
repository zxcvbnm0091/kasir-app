<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// LOGIN (Not working because the login feature is not implemented yet)
// Route::get('/', [AuthController::class, 'index']);
// Route::post('/cek_login', [AuthController::class, 'cek_login']);
// Route::get('/input', [AuthController::class, 'logout']);

// Route::group(['middlewawre' => ['auth', 'checkRole:admin']], function () {

//     //crud data user
//     Route::get('/user', [UserController::class, 'index']);
//     Route::post('/user/store', [UserController::class, 'store']);
//     Route::post('/User/update/{$id}', [UserController::class, 'update']);
//     Route::get('/User/hapus/{$id}', [UserController::class, 'destroy']);

//     // Data Jenis Barang
//     Route::get('/jenisbarang', [UserController::class, 'index']);
//     Route::post('/jenisbarang/store', [UserController::class, 'store']);
//     Route::post('/jenisbarang/update/{id}', [UserController::class, 'update']);
//     Route::get('/jenisbarang/hapus/{id}', [UserController::class, 'destroy']);
// });

// Route::group(['middleware' => ['auth', "checkRole:admin, kasir"]], function () {
//     Route::get('/', [HomeController::class, 'index']);
// });


// Without Login
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/hapus/{id}', [UserController::class, 'destroy']);

Route::get('/', [HomeController::class, 'index']);

// Data Jenis Barang
Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store']);
Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
Route::get('/jenisbarang/hapus/{id}', [JenisBarangController::class, 'destroy']);

// Data  Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy']);

// Setting  Diskon
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);
