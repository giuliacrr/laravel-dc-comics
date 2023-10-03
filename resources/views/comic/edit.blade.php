@extends('layouts.public')
@section('title', 'DC Comics - Modify')
{{--Mettiamo il metodo e gli specifichiamo che vogliamo la rotta in PUT--}}

@section('content')
<div class="container text-white">
  {{-- In action metto la route dell'update' e il method deve essere POST per inviare i dati--}}
  <form action="{{ route('comic.update', $comic->id ) }}" method="POST">

    @csrf()
    @method ('PUT')
    <!--Devo dargli l'id con old per fargli vedere i dati di quell'esatto ID e modificarli
    La funzione old ha anche una particolarità: 
    Posso dargli 2 argomenti: nel caso in cui il primo valore (vecchio) non esista, glie ne diamo un secondo noi $comic->title o qualsiasi cosa sia-->
    <!--Title-->
    <div class="mb-3">
      <label class="form-label">Title:</label>
      <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title', $comic->title) }}">
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Description-->
    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old("description", $comic->description)}}</textarea>
      @error('description')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Thumb-->
    <div class="mb-3">
      <label class="form-label">Thumbnail:</label>
      <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" value="{{ old('thumb', $comic->thumb) }}">
      @error('thumb')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Price-->
    <div class="mb-3">
      <label class="form-label">Price:</label>
      <input type="text" step="0.1" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $comic->price) }}">
      @error('price')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Series-->
    <div class="mb-3">
      <label class="form-label">Series:</label>
      <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" value="{{ old('series', $comic->series) }}">
      @error('series')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Sale date-->
    <div class="mb-3">
      <label class="form-label">Sale date:</label>
      <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
      @error('sale_date')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Type-->
    <div class="mb-3">
      <label class="form-label">Type</label>
      <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type', $comic->type) }}">
      @error('type')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!--Artist & Writers-->
    <div class="mb-3">
      <label class="form-label">Artists</label>
      <input type="text" class="form-control @error('artists') is-invalid @enderror" name="artists" value="{{ old('artists', join(", ",json_decode($comic["artists"]))) }}">
      @error('artists')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Writers</label>
      <input type="text" class="form-control @error('writers') is-invalid @enderror" name="writers" value="{{ old('writers', join(", ",json_decode($comic["writers"]))) }}">
      @error('writers')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <!--Per visualizzare gli errori della view in questione, su laravel cerca "Errors". 
    Troveremo una classe di laravel $errors.-->

    <a class="btn btn-secondary" href="{{ route("comic.index") }}">Cancel</a>
    <button class="btn btn-primary">Save changes</button>
  </form>
</div>
@endsection
