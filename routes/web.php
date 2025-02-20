<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'layouts.dashboard');
Route::view('/login', 'auth.login');
Route::view('/home', 'pages.home');
Route::get('/register', function () {
    return view('auth.register');
});


//================================= ROOMS ===================================
Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/rooms/create', [RoomController::class, 'create']);
Route::get('/rooms/delete/{room}', [RoomController::class, 'delete']);


//================================= USERS ===================================
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);


//================================= ROLES ===================================
Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index']);
Route::get('/roles/create', [\App\Http\Controllers\RoleController::class, 'create']);



///

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
