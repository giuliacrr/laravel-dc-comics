<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    public function index(){
        $comics = Comic::all();

        return view("comic.index", ["comics"=>$comics]);
    }

    public function show($id) {
        $comics = Comic::findOrFail($id);
        return view("comic.show", ["comics" =>$comics]);
    }
}
