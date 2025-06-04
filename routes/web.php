<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\OffloadController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\SignOutController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect()->route("home"));

Route::get("/auth", [AuthController::class, "index"])->name("auth")->middleware("guest");
Route::post("/auth", [AuthController::class, "login"])->middleware("guest");

Route::post("/signout", [SignOutController::class, "logout"])->name("signout")->middleware(CheckAuth::class);

Route::get("/reset", [ResetController::class, "index"])->name("reset")->middleware("guest");
Route::post("/reset", [ResetController::class, "resetPassword"])->middleware("guest");

Route::get("/home", [HomeController::class, "index"])->name("home")->middleware(CheckAuth::class);
Route::post("/home", [HomeController::class, "index"])->name("home")->middleware(CheckAuth::class);

Route::get("/offload/{token}", [OffloadController::class, "index"])->name("offload")->middleware(CheckAuth::class);
Route::post("/offload/{token}", [OffloadController::class, "offload"])->middleware(CheckAuth::class);

Route::resource("/responsable", ResponsableController::class)->middleware(CheckAuth::class)->names("responsable");

Route::resource("/etudiant", EtudiantsController::class)->middleware(CheckAuth::class)->names("etudiant");

Route::get("/historique", [HistoriqueController::class, "index"])->middleware(CheckAuth::class)->name("historique");
Route::post("/historique", [HistoriqueController::class, "update"])->middleware(CheckAuth::class);

Route::resource("/materiel", MaterielController::class)->middleware(CheckAuth::class)->names("materiel");