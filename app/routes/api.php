<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\BookController as GetBookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('book/create', [BookController::class, 'create']);
Route::get('getBooks', [GetBookController::class, 'getBooks']);
