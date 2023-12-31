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

    //SHOW -- uso l'id per pescare l'oggetto /1, /2, /3 , ... (sarebbe {comic})
    public function show($id) {
        $comics = Comic::findOrFail($id);
        return view("comic.show", ["comics" =>$comics]);
    }

    //CREATE --
    public function create(){
        return view("comic.create");
    }

    //STORE -- LEgge i dati inviati dal form con request
    public function store(Request $request) {
        
        //Controlliamo i dati che riceviamo con il formato che vogliamo.
        //Vedi parametri di validazione su Laravel Validation.
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
            //Come indico però all'utente se ha sbagliato a inserire un parametro?

        $data["artists"] = json_encode([$data["artists"]]);
        $data["writers"] = json_encode([$data["writers"]]);

        $newComic = new Comic();
        $newComic->fill($data);

        //Salviamo i file nel database
        $newComic->save();
        
        //Rimandiamo l'utente su un'altra pagina che vogliamo dopo aver salvato i dati;
        //Se non viene fatto, l'utente può inviare gli stessi dati più volte, cosa che NON vogliamo
        return redirect()->route('comic.index');
    }

     //EDIT
    public function edit($id) {
        $comics = Comic::findOrFail($id);
        return view('comic.edit', ["comic"=> $comics]);
    }

    //UPDATE
    public function update( Request $request, $id) {

        $comics = Comic::findOrFail($id);

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

            //Si comporta coem un fill() + save();
            $comics->update($data);

            //Come per lo store, facciamo un redirect;
            return redirect()->route('comic.show', $comics->id);
    }

    //TRASH
    public function trash() {
        $comics = Comic::onlyTrashed()->get();
        return view("comic.trash", ["comics" => $comics]);
    }

    //DESTROY
    //Inserisco il request per recuperare i dati per il force delete (vedi florian)
    public function destroy(Request $request, $id){

        if ($request->input("force")) {
            $comics = Comic::onlyTrashed()->where("id", $id)->first();
            //Force delete (permanente)
            $comics->forceDelete();
        }else {
            $comics = Comic::findOrFail($id);
            //Soft delete (non permanente -> trash)
            $comics->delete();
        }

        return redirect()->route('comic.index');
    }

    
}
