<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarningsController;
use Illuminate\Support\Facades\Route;

//Autenticaçãi
Route::get('/auth/register', [UsersController::class, 'register'])->name('register');

Route::post('/auth/register', [UsersController::class, 'store'])->name('new-user');

Route::get('/auth/login', [UsersController::class, 'login'])->name('login');

Route::post('/auth/auth', [UsersController::class, 'auth'])->name('auth');

Route::post('/auth/logout', [UsersController::class, 'logout'])->name('logout');


//Resetar senha
Route::get('/auth/forget-password', [UsersController::class, 'showForgetPassword'])->name('show-forget-password');

Route::post('/auth/forget-password', [UsersController::class, 'submitForgetPassword'])->name('submit-forget-password');

Route::get('auth/reset-password/{token}', [UsersController::class, 'showResetPassword'])->name('reset-password');

Route::post('/auth/reset-password', [UsersController::class, 'submitResetPassword'])->name('submit-password');


//Atualização de dados do usuário
Route::get('/user-info', [UsersController::class, "userInfo"])->name('user-info');

Route::post('/user-info', [UsersController::class, "verifyUserInfo"])->name('verifyUserInfo');

Route::get('/new-user-info', [UsersController::class, "newUserInfo"])->name('new-user-info');

Route::post('/new-user-info', [UsersController::class, "setnewUserInfo"])->name('set-new-user-info');

Route::get('/password', [UsersController::class, "password"])->name('password');

Route::post('/password', [UsersController::class, "verifyPassword"])->name('verify-password');

Route::get('/new-password', [UsersController::class, "newPassword"])->name('newPassword');

Route::post('/newpassword', [UsersController::class, "setnewPassword"])->name('set-new-password');


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

Route::post('/lectures/join/{id}', [LecturesController::class, "join"])->name('join')->middleware('auth');

Route::delete('/lectures/leave/{id}', [LecturesController::class, "leave"])->name('leave')->middleware('auth');

/* Rota desabilitada
Route::delete('/lectures/destroy/{id}', [LecturesController::class, "destroy"])->middleware('auth');
*/


//Dashboard
Route::get('/dashboard', [UsersController::class, "dashboard"])->name('dashboard')->middleware('auth');

Route::get('/dashboard/{id}', [UsersController::class, "show"])->name('user')->middleware('auth')->middleware('admin');

Route::post('/dashboard/permission/{id}', [UsersController::class, 'permission'])->name('permission');

Route::post('/dashboard/appointment/{id}', [AppointmentsController::class, 'store'])->name('appointment-store')->middleware('auth')->middleware('profissional');

Route::get('/dashboard/appointment/{id}', [AppointmentsController::class, 'show'])->name('appointment')->middleware('auth');


//Aviso Geral
Route::post('/warning', [WarningsController::class, "store"])->name('warning')->middleware('auth')->middleware('admin');

Route::delete('/warning/destroy/{id}', [WarningsController::class, "destroy"])->name('warning-destroy')->middleware('auth')->middleware('admin');


//Profissional
Route::get('/professionals', [WarningsController::class, "professionals"])->name('professionals');


//Eva
Route::get('/eva', [WarningsController::class, "eva"])->name('eva');




?>
