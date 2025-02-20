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
Route::get('/rooms/{room}', [RoomController::class, 'show']);
Route::post('/rooms/create', [RoomController::class, 'create']);
Route::put('/rooms/update/{room}', [RoomController::class, 'update']);
Route::delete('/rooms/delete/{room}', [RoomController::class, 'delete']);
Route::get('/rooms/update/{room}', [RoomController::class, 'getRoom']);


//================================= USERS ===================================
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::delete('/users/delete/{user}', [UserController::class, 'delete']);


//================================= ROLES ===================================
Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index']);
Route::get('/roles/create', [\App\Http\Controllers\RoleController::class, 'create']);



///

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
