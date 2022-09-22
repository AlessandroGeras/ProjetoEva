<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PalestrasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarningsController;
use Illuminate\Support\Facades\Route;

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

Route::post('/criarPalestra', [PalestrasController::class, 'store'])->name('criarPalestra');

Route::get('/palestras/{id}', [PalestrasController::class, 'palestra']);

Route::put('/palestras/edit/{id}', [PalestrasController::class, 'update'])
    ->name('editarPalestra')
    ->middleware('auth');

/* Rota desabilitada
Route::delete('/palestras/destroy/{id}', [PalestrasController::class, "destroy"])->middleware('auth');
*/


//Dashboard
Route::get('/dashboard', [UsersController::class, "dashboard"])->name('dashboard')->middleware('auth');

Route::get('/dashboard/{id}', [UsersController::class, "show"])->name('user')->middleware('auth')->middleware('admin');

Route::post('/dashboard/permission/{id}', [UsersController::class, 'permission'])->name('permission');

Route::post('/dashboard/consulta/{id}', [ConsultasController::class, 'store'])->name('consultaStore')->middleware('auth')->middleware('profissional');

Route::get('/dashboard/consulta/{id}', [ConsultasController::class, 'show'])->name('consulta')->middleware('auth');



//Warning
Route::post('/warning', [WarningsController::class, "store"])->name('warning')->middleware('auth')->middleware('admin');

Route::delete('/warning/destroy/{id}', [WarningsController::class, "destroy"])->name('warningDestroy')->middleware('auth')->middleware('admin');




?>