<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservationController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//================================= VIEWS ===================================
Route::get('/', [Controller::class, 'stats']);
Route::view('/login', 'auth.login');
Route::view('/home', 'pages.home');
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin/stats', [Controller::class, 'stats']);


//================================= ROOMS ===================================
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/room/{room}', [RoomController::class, 'show']);

Route::post('/admin/room/create', [RoomController::class, 'create']);
Route::put('/admin/room/update/{room}', [RoomController::class, 'update']);
Route::delete('/admin/room/delete/{room}', [RoomController::class, 'delete']);
Route::get('/admin/room/get/{room}', [RoomController::class, 'getRoom']);

Route::post('/room/book', [ReservationController::class, 'book']);


//================================= USERS ===================================
Route::get('/admin/users', [UserController::class, 'index']);
Route::post('/admin/user/create', [UserController::class, 'create']);
Route::delete('/admin/user/delete/{user}', [UserController::class, 'delete']);
Route::put('/admin/user/update/{user}', [UserController::class, 'update']);
Route::get('/admin/user/get/{user}', [UserController::class, 'getUser']);


//================================= ROLES ===================================
Route::get('/admin/roles', [RoleController::class, 'index']);
Route::get('/admin/role/create', [RoleController::class, 'create']);
Route::delete('/admin/role/delete/{role}', [RoleController::class, 'delete']);
Route::put('/admin/role/update/{role}', [RoleController::class, 'update']);
Route::get('/admin/role/get/{role}', [RoleController::class, 'getRole']);



//================================= RESERVATIONS ===================================
Route::get('/admin/reservations', [ReservationController::class, 'index']);







/////////////

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
