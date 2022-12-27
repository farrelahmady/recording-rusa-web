<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RusaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PenangkaranController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\RolePengurusController;
use App\Http\Controllers\SeksiKonservasiController;

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

Route::resources([
    "administrasi" => AdministrasiController::class,
    "kesehatan" => KesehatanController::class,
    "penangkaran" => PenangkaranController::class,
    "pengurus" => PengurusController::class,
    "permission" => PermissionController::class,
    "pengurus/role" => RolePengurusController::class,
    "rusa" => RusaController::class,
]);

Route::prefix("pemilik")->controller(PemilikController::class)->group(function () {
    Route::get("login");
    Route::post("login");
    Route::post("logout");
});
Route::prefix("seksikonservasi")->controller(SeksiKonservasiController::class)->group(function () {
    Route::get("login");
    Route::post("login");
    Route::post("logout");
});
