<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
 
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
 
//Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
 
//Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::get('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');
 
//Logout
 
Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
 
Route::get('home', [HomeController::class, 'actionLogout'])->name('home')->middleware('auth');