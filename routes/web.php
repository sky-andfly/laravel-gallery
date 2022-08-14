<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\AboutController;

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

Route::get('/', [ImagesController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/add', [ImagesController::class, 'add']);
Route::get("/show/{id}", [ImagesController::class, 'show']);
Route::get("edit/{id}", [ImagesController::class, 'edit']);
Route::get('delete/{id}', [ImagesController::class, 'delete']);

//post
Route::post("/update/{id}",[ImagesController::class, 'update']);

Route::post('/store', [ImagesController::class, 'store']);
