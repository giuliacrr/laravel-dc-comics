@extends('layouts.public')
@section("title", "DC Comics - Form")


@section('content')
<div class="container text-white">
  {{-- In action metto la route dello store e il method deve essere POST per inviare i dati--}}
  <form action="{{ route('comic.store') }}" method="POST">
    @csrf()
    <!--Title-->
    <div class="mb-3"><label class="form-label">Title:</label><input type="text" class="form-control" name="title"></div>
    <!--Description-->
    <div class="mb-3"><label class="form-label">Description:</label><textarea class="form-control" name="description"></textarea></div>
    <!--Thumb-->
    <div class="mb-3"><label class="form-label">Thumbnail:</label><input type="text" class="form-control" name="thumb"></div>
    <!--Price-->
    <div class="mb-3"><label class="form-label">Price:</label><input type="text" step="0.1" class="form-control" name="price"></div>
    <!--Series-->
    <div class="mb-3"><label class="form-label">Series:</label><input type="text" class="form-control" name="series"></div>
    <!--Sale date-->
    <div class="mb-3"><label class="form-label">Sale date:</label><input type="date" class="form-control" name="sale_date"></div>
    <!--Type-->
    <div class="mb-3"><label class="form-label">Type</label><input type="text" class="form-control" name="type"></div>
    <!--Artist & Writers-->
    <div class="mb-3"><label class="form-label">Artists</label><input type="text" class="form-control" name="artists"></div>
    <div class="mb-3"><label class="form-label">Writers</label><input type="text" class="form-control" name="writers"></div>
    <!--Per visualizzare gli errori della view in questione, su laravel cerca "Errors". 
    Troveremo una classe di laravel $errors.-->

    <a class="btn btn-secondary" href="{{ route("comic.index") }}">Cancel</a>
    <button class="btn btn-primary">Save</button>
  </form>
</div>
@endsection
{{-- 
  1)Faccio il dump di $errors per visualizzare l'array degli errori;

  2)Se dovesse esserci un errore, l'array ci dirà quale campo è errato;

  3)Possiamo far stampare l'errore sotto ogni input (quelli errati) usando un tag
    speciale "@error('title') is-invalid @enderror", vedi doc Laravel.
    Va fatto su tutti gli input. Non è obbligatorio farlo così, dipende
    dalla grafica che vogliamo avere (tutti insieme o sotto ogni input);

  4) Come faccio a salvare i dati nei format se sono errati, per non riscriverli?
    uso value ="{{ old('title') }}", dove nella funzione metto il parametro che
    vogliamo resti salvato. 
  --}}