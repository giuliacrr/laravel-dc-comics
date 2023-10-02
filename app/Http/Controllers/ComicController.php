<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    //INDEX
    public function index(){
        $comics = Comic::all();
        return view("comic.index", ["comics"=>$comics]);
    }

    //SHOW
    public function show($id) {
        $comics = Comic::findOrFail($id);
        return view("comic.show", ["comics" =>$comics]);
    }

    //CREATE
    public function create(){
        return view("comic.create");
    }

    //STORE
    public function store(Request $request) {
        
        $data = $request->validate ([
            "title"=>"required|string",
            "description"=>"required|string",
            "thumb"=>"nullable|string",
            "price"=>"required|decimal:2,6",
            "series"=>"required|string",
            "sale_date"=>"nullable|date",
            "type"=>"nullable|string",
            "artists"=>"nullable|string",
            "writers"=>"nullable|string",
            ]);

        $data["artists"] = json_encode([$data["artists"]]);
        $data["writers"] = json_encode([$data["writers"]]);

        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('comic.index');
    }
}
