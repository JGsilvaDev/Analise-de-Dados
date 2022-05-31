<?php

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

/*oioi*/

use App\Http\Controllers\EventController;
use App\Http\Controllers\Http\Controllers;

Route::get('/', [EventController::class, 'index']); 

Route::get('/lixo', [EventController::class, 'lixo']);

Route::get('/moradores', [EventController::class, 'moradores']);

Route::get('/saudemental', [EventController::class, 'saudemental']);

Route::post('/lixo', [EventController::class, 'lixoteste']);