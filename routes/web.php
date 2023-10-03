<?php

use App\Http\Controllers\ComicController;
use Illuminate\Routing\Route as RoutingRoute;
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
//REDIRECT FROM / TO /COMIC
Route::get("/", function(){return redirect("/comic");});

//CREATE
Route::get("/comic/create", [ComicController::class, "create"])->name("comic.create");//Indirizza ad una pagina con form per inserire i dati;
Route::post("/comic", [ComicController::class, "store"])->name("comic.store");//Rotta di dove verranno inviati i dati. Essa è in POST. 

//READ
Route::get('/comic', [ComicController::class, "index"])->name("comic.index");//Anteprima degli elementi
Route::get('/comic/{comic}', [ComicController::class, "show"])->name("comic.show");//Dettagli di un elemento

//UPDATE
Route::get('/comic/{comic}/edit', [ComicController::class, "edit"])->name("comic.edit");
//Route::patch('/comic/{comic}', [ComicController::class, "update"])->name("comic.update");
//Route::put('/comic/{comic}', [ComicController::class, "update"])->name("comic.update");
Route::match(["patch","put"], '/comic/{comic}/update', [ComicController::class, "update"])->name("comic.update");

//DESTROY - il metodo è DELETE e anche sul controller è $comics->delete();
Route::delete('/comic/{comic}', [ComicController::class, "destroy"])->name("comic.destroy");
