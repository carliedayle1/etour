<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TouristSpotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/users', [UserController::class, 'store']);

Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/manage-users', [UserController::class, 'index'])->middleware('auth');

Route::put('/users/{user}/verify', [UserController::class, 'verify'])->middleware('auth');

Route::get('/manage-tourist-spots', [TouristSpotController::class, 'manage'])->middleware('auth');

Route::get('/tourist-spots/create', [TouristSpotController::class, 'create'])->middleware('auth');

Route::post('/tourist-spots/store', [TouristSpotController::class, 'store']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/tourist-spots/{touristSpot}', [TouristSpotController::class, 'show']);

Route::delete('/tourist-spots/{touristSpot}', [TouristSpotController::class, 'destroy'])->middleware('auth');

Route::get('/tourist-spots/{touristSpot}/edit', [TouristSpotController::class, 'edit'])->middleware('auth');

Route::put('/tourist-spots/{touristSpot}/update', [TouristSpotController::class, 'update'])->middleware('auth');

Route::get('/tourist-spots', [TouristSpotController::class, 'index']);

