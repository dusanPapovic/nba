<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [TeamController::class, 'index']);
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('team');
    Route::get('/player/{player}', [PlayerController::class, 'show'])->name('player');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/teams/{team}/comments', [CommentController::class, 'store'])->name('createComment');

    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news');
    Route::get('/news/team/{teamName}', [NewsController::class, 'newsTeam']);
    Route::get('/create/news', [NewsController::class, 'create']);
    Route::post('/create/news', [NewsController::class, 'store']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'getLoginBlade'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
