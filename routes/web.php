<?php

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
    return view('welcome');
});

use App\Http\Controllers\AuthController;
Route::get('/', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/registration', [AuthController::class, 'registration']);

//Добавление информации об избранной монете

Route::get('/test/api', [AuthController::class, 'apitest']);

//Тест проверки цены
Route::get('/test/costNoticeUpdater', [AuthController::class, 'costNoticeUpdaterTest']);

Route::get('/exit', [AuthController::class, 'exit']);