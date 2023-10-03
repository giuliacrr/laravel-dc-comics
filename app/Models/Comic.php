<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory; // SoftDeletes; //SoftDeletes ha però bisogno una colonna deleted_at
    //quindi dobbiamo creare una migration  add_soft_delete_to_comics_table
    //è possibile anche ripristinarlo #Restoring Soft Deleted Models su Laravel.
    //Se voglio cancellarlo definitivamente, posso fare il forceDelete() (cerca Laravel);

    protected $table = "comics";


        // Mi permette di convertire i dati delle colonne
        //In tipologie differenti
    protected $casts = [
        "sale_date"=>"date",
    ];

    //Colonne che vogliamo popolare (in questo caso tutte lol)
    protected $fillable = [
        "title",
        "description",
        "thumb",
        "price",
        "series",
        "sale_date",
        "type",
        "artists",
        "writers",
    ];
}
