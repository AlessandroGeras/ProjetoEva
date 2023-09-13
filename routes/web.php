<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get("/", [ContactController::class, "index"])->name("index.contact");

Route::get("/contact/register", [ContactController::class, "register"])->name("register.contact.view");
Route::post("/contact/register", [ContactController::class, "store"])->name("register.contact");

Route::get("/contact/{id}", [ContactController::class, "show"])->name("show.contact");

Route::get("/edit/{id}", [ContactController::class, "edit"])->name("edit.contact");
Route::post("/edit/{id}", [ContactController::class, "update"])->name("update.contact");

Route::get("/delete/{contact}", [ContactController::class, "softDelete"])->name("delete.contact");
Route::delete("/destroy/{contact}", [ContactController::class, "destroy"])->name("destroy.contact");

Route::get("/login", [ContactController::class, "login"])->name("login.contact");
Route::post("/check_login", [ContactController::class, "check_login"])->name("check_login.contact");

