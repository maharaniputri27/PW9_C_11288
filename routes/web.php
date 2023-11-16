<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MengembalikanController;
use App\Http\Controllers\PinjamBukuController;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('buku', BukuController::class);

Route::get('pinjam', [PinjamBukuController::class, 'index'])->name('pinjam');
Route::get('/ambil/{id_buku}', [PinjamBukuController::class, 'ambil'])->name('pinjam.update')->middleware('auth');

Route::get('kembalikan', [MengembalikanController::class, 'index'])->name('kembalikan');
Route::get('/mengembalikan/{id_buku}', [MengembalikanController::class, 'mengembalikan'])->name('kembalikan.update')->middleware('auth');
