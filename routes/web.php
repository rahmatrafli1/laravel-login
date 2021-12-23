<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('read', [CrudController::class, 'lihatdata']);
Route::get('form', [HomeController::class, 'form']);
Route::post('prosestambah', [CrudController::class, 'prosestambah']);
Route::get('editdata/{id}', [CrudController::class, 'editdata']);
Route::put('prosesedit/{id}', [CrudController::class, 'prosesedit']);
Route::get('hapus/{id}', [CrudController::class, 'hapusdata']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('user', [HomeController::class, 'user']);
Route::get('changepassword/{id}', [HomeController::class, 'changepassword']);
Route::put('prosesubahpassword/{id}', [HomeController::class, 'prosesubahpassword']);

Route::get('login', [LoginController::class, 'index']);
Route::post('tambahlogin', [LoginController::class, 'tambahlogin']);
Route::get('register', [LoginController::class, 'register']);
Route::post('proseslogin', [LoginController::class, 'login']);
