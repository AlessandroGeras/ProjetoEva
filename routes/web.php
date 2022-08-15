<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PalestrasController;
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

use App\Http\Controllers\UsersController;

Route::get('/', [UsersController::class, "index"]);

Route::get('/palestras', [PalestrasController::class, "show"]);

Route::post('/criar_palestra', [PalestrasController::class, "store"]);