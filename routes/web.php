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
Route::get('/comic/{comic}', [ComicController::class, "show"])->name("comic.show");
Route::get("/", function(){return redirect("/comic");});