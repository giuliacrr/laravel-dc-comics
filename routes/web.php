<?php

use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/comic', [ComicController::class, "index"])->name("comic.index");
Route::get("/", function(){return redirect("/comic");});

Route::get("/comic/create", [ComicController::class, "create"])->name("comic.create");
Route::post("/comic", [ComicController::class, "store"])->name("comic.store");

Route::get('/comic/{comic}', [ComicController::class, "show"])->name("comic.show");