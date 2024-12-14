<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [UserController::class, "welcome"])->name("welcome");

Route::middleware("guest")->group(function(){
    Route::get("/home", [UserController::class, "home"])->name("home");
    Route::get("/login", [UserController::class, "login"])->name("login");
    Route::get("/register", [UserController::class, "register"])->name("register");
    Route::post("/register-auth", [UserController::class, "registerAuth"])->name("register-auth");
    Route::post("/login-auth", [UserController::class, "loginAuth"])->name("login-auth");
});
Route::middleware("auth")->group(function(){

    Route::get("/auth", [UserController::class, "auth"])->name("auth");
    Route::get("/logout", [UserController::class, "logout"])->name("logout");
    Route::post("/progress-check/{id}", [UserController::class, "progressCheck"])->name("progress-check");
});

Route::middleware("admin")->group(function(){
    Route::get("/admin", [AdminController::class, "admin"])->name("admin");
    Route::get("/admin-panel", [AdminController::class, "adminPanel"])->name("admin-panel");
    Route::post("/admin-panel-create", [AdminController::class, "adminPanelCreate"])->name("admin-panel-create");
    Route::post("/admin-panel-update/{id}", [AdminController::class, "adminPanelUpdate"])->name("admin-panel-update");
});