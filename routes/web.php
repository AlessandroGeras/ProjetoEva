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

//Rotas de Autenticação
Route::get('/auth/login', [UsersController::class, "login"])->name('login');

Route::post('/autenticar', [UsersController::class, "autorizar"])->name('autenticar');

Route::get('/logout', [UsersController::class, "logout"])->name('logout');

Route::get('/register', [UsersController::class, "register"])->name('register');

Route::post('/newuser', [UsersController::class, "store"])->name('newuser');

Route::get('forget_password', [UsersController::class, 'showForgetPasswordForm'])->name('showForgetPasswordForm');

Route::post('forget_password', [UsersController::class, 'submitForgetPasswordForm'])->name('submitForgetPasswordForm'); 

Route::get('reset_password/{token}', [UsersController::class, 'showResetPasswordForm'])->name('resetPassword');

//Home
Route::get('/', [UsersController::class, "index"]);

//Rotas das Palestras
Route::get('/palestras', [PalestrasController::class, "show"])->name('palestras')->middleware('auth');

Route::post('/criar_palestra', [PalestrasController::class, "store"])->name('criar_palestra');

Route::get('/palestras/{id}', [PalestrasController::class, "palestra"]);




?>
