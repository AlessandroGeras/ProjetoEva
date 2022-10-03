<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarningsController;
use Illuminate\Support\Facades\Route;

//Autenticação
Route::get('/auth/login', [UsersController::class, 'login'])->name('login');

Route::post('/autenticar', [UsersController::class, 'autorizar'])->name('autenticar');

Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

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
Route::get('/', [UsersController::class, 'index'])->name('index');


//Palestras
Route::get('/lectures', [LecturesController::class, 'show'])
    ->name('lectures')
    ->middleware('auth');

Route::post('/createLecture', [LecturesController::class, 'store'])->name('createLecture');

Route::get('/lectures/{id}', [LecturesController::class, 'lecture']);

Route::put('/lectures/edit/{id}', [LecturesController::class, 'update'])
    ->name('editLecture')
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
Route::post('/profissionais', [WarningsController::class, "profissionais"])->name('profissionais');


//Eva
Route::post('/eva', [WarningsController::class, "eva"])->name('eva');




?>
