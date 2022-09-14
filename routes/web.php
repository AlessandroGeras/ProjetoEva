<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PalestrasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\UsersController;

//Autenticação
Route::get('/auth/login', [UsersController::class, 'login'])->name('login');

Route::post('/autenticar', [UsersController::class, 'autorizar'])->name('autenticar');

Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/register', [UsersController::class, 'register'])->name('register');

Route::post('/newuser', [UsersController::class, 'store'])->name('newuser');

Route::get('forget_password', [UsersController::class, 'showForgetPasswordForm'])->name('showForgetPasswordForm');

Route::post('forget_password', [UsersController::class, 'submitForgetPasswordForm'])->name('submitForgetPasswordForm');

Route::get('reset_password/{token}', [UsersController::class, 'showResetPasswordForm'])->name('resetPassword');

Route::post('reset_password', [UsersController::class, 'submitResetPasswordForm'])->name('submitPassword');


//Atualização de dados do usuário
Route::get('/userinfo', [UsersController::class, "userInfo"])->name('userInfo');

Route::post('/userinfo', [UsersController::class, "verifyUserInfo"])->name('verifyUserInfo');

Route::get('/newUserInfo', [UsersController::class, "newUserInfo"])->name('newUserInfo');

Route::post('/newUserInfo', [UsersController::class, "setnewUserInfo"])->name('setnewUserInfo');

Route::get('/password', [UsersController::class, "password"])->name('password');

Route::post('/password', [UsersController::class, "verifyPassword"])->name('verifyPassword');

Route::get('/newpassword', [UsersController::class, "newPassword"])->name('newPassword');

Route::post('/newpassword', [UsersController::class, "setnewPassword"])->name('setnewPassword');


//Home
Route::get('/', [UsersController::class, 'index']);

//Palestras
Route::get('/palestras', [PalestrasController::class, 'show'])
    ->name('palestras')
    ->middleware('auth');

Route::post('/criar_palestra', [PalestrasController::class, 'store'])->name('criar_palestra');

Route::get('/palestras/{id}', [PalestrasController::class, 'palestra']);

Route::put('/palestras/edit/{id}', [PalestrasController::class, 'update'])
    ->name('editarPalestra')
    ->middleware('auth');

/* Rota desabilitada
Route::delete('/palestras/destroy/{id}', [PalestrasController::class, "destroy"])->middleware('auth');
*/


//Dashboard
Route::get('/dashboard', [UsersController::class, "dashboard"])->name('dashboard')->middleware('auth');
?>