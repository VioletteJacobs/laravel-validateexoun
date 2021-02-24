<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, "index"]);
Route::get('/create', [BookController::class, "create"]);
Route::get('/book-edit/{id}', [BookController::class, "edit"]);

Route::post('/add-book', [BookController::class, "store"]);
Route::post('/delete-book/{id}', [BookController::class, "destroy"]);
Route::post('/update-book/{id}', [BookController::class, "update"]);