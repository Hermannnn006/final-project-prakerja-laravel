<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBarangController;
use App\Http\Controllers\DashboardKategoriController;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [BerandaController::class, 'index']);
Route::get('post/{post:slug}', [BerandaController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

    Route::resource('/dashboard/post', DashboardPostController::class);
    Route::resource('/dashboard/produk', DashboardBarangController::class);
    Route::resource('/dashboard/kategori', DashboardKategoriController::class);
    
    //hanya dapat diakses admin
    Route::resource('/dashboard/user', DashboardUserController::class)->middleware('status');
});

Auth::routes();