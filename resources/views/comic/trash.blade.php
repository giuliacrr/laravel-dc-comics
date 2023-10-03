@extends('layouts.public')
@section('title', '"Delete - DC Comics')
{{--CERCA SOFTDELETE SU LARAVEL
  Posso anche creare una view cestino comic.trash in cui facciamo quello che fa index ma anzichè all, useremo ::onlyTrashed()
  nel quale poi metteremo un pulsante al cui form passeremo l'id e un "force"=>true che passeremo poi come query string con ? --}}
