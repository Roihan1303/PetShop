<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('prosesLogin', [AuthController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('prosesRegister', [AuthController::class, 'prosesRegister'])->name('prosesRegister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [PageController::class, 'profile'])->name('profile');
Route::put('updateProfile/{user}', [PageController::class, 'updateProfile'])->name('updateProfile');

//Hewan
Route::resource('hewan', HewanController::class);

//Order
Route::get('order/{hewan}', [OrderController::class, 'index'])->name('order.index');
