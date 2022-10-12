<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarningsController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/auth/register', [UsersController::class, 'register'])->name('register');

Route::post('/auth/register', [UsersController::class, 'store'])->name('new-user');

Route::get('/auth/login', [UsersController::class, 'login'])->name('login');

Route::post('/auth/auth', [UsersController::class, 'auth'])->name('auth');

Route::post('/auth/logout', [UsersController::class, 'logout'])->name('logout');

//Reset Password
Route::get('/auth/forget-password', [UsersController::class, 'showForgetPassword'])->name('show-forget-password');

Route::post('/auth/forget-password', [UsersController::class, 'submitForgetPassword'])->name('submit-forget-password');

Route::get('auth/reset-password/{token}', [UsersController::class, 'showResetPassword'])->name('reset-password');

Route::post('/auth/reset-password', [UsersController::class, 'submitResetPassword'])->name('submit-password');




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
Route::get('/', [UsersController::class, 'index'])->name('index');


//Palestras
Route::get('/lectures', [LecturesController::class, 'show'])
    ->name('lectures');

Route::post('/create-lecture', [LecturesController::class, 'store'])->name('create-lecture');

Route::get('/lectures/{id}', [LecturesController::class, 'lecture'])->name('lecture')->middleware('auth');

Route::put('/lectures/edit/{id}', [LecturesController::class, 'update'])
    ->name('edit-lecture')
    ->middleware('auth');

/* Rota desabilitada
Route::delete('/lectures/destroy/{id}', [LecturesController::class, "destroy"])->middleware('auth');
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


//Profissional
Route::post('/professionals', [WarningsController::class, "professionals"])->name('professionals');


//Eva
Route::post('/eva', [WarningsController::class, "eva"])->name('eva');




?>
