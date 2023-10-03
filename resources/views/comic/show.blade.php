@extends("layouts.public")
@section("title",  $comics["title"])

@section("content")

<div class="container">
{{--METTI PULSANTE EDIT CHE MANDA AD EDIT DI QUELL'ID--}}
{{--METTI PULSANTE cancella IN UN FORM--}}
  <div class="card mb-3 mt-5">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $comics["thumb"] }}" class="img-fluid rounded-start" alt="{{ $comics['title'] }}">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-primary fw-bold">{{$comics["title"]}}</h5>
          <p class="card-text">{{$comics["description"]}}</p>
          <div class="card-text">
            <span class="fw-bold text-primary">Series: </span>
            <small class="text-body-secondary">{{$comics["series"]}}</small>
          </div>
          <div class="card-text">
            <span class="fw-bold text-primary">Sale date: </span>
            <small class="text-body-secondary">{{$comics["sale_date"]}}</small>
          </div>
          <div class="card-text">
            <span class="fw-bold text-primary">Type: </span>
            <small class="text-body-secondary">{{$comics["type"]}}</small>
          </div>
          <div class="mt-1 mb-1">
            <div class="card-text text-primary">
              <span class="fw-bold">Artists: </span>
              <small class="text-body-secondary">{{join(", ",json_decode($comics["artists"]))}}</small>
            </div>
            <div class="card-text text-primary">
              <span class="fw-bold">Writers: </span>
              <small class="text-body-secondary">{{join(", ",json_decode($comics["writers"]))}}</small>
            </div>
          </div>
          <a href="{{ route('comic.edit', $comics->id) }}" class="btn btn-warning">Edit</a>
        </div>
      </div>
    </div>
  </div>

  
  <div class="d-flex justify-content-center mb-3">
    <a href="{{ route('comic.index', ["id" => $comics['id']]) }}" class="btn btn-outline-primary ms-2 me-2">Go back</a>
    <a href="{{ route('comic.index', ["id" => $comics['id']]) }}" class="btn btn-outline-primary ms-2 me-2">Buy for {{$comics["price"]}}&euro;</a>
  </div>


</div>

@endsection