@extends('layouts.public')
@section('title', 'Deleted - DC Comics')
{{--CERCA SOFTDELETE SU LARAVEL
  Posso anche creare una view cestino comic.trash in cui facciamo quello che fa index ma anzichè all, useremo ::onlyTrashed()
  nel quale poi metteremo un pulsante al cui form passeremo l'id e un "force"=>true che passeremo poi come query string con ? --}}
@section("content")
  <div class="container">
    <div class="text-primary text-center">
      <h2>Deleted Comics</h2>
      <p>To go back to homepage, use navbar "Comics"</p>
    </div>

    <div>
      <div class="d-flex flex-wrap custom-style">
        @foreach($comics as $card)
        <div class="cardz-box position-relative mb-3 {{ request()->input("id") == $card->id ? 'border-success' : '' }}">
          <!--immagine-->
          <div>
            <img class="img-cardz" src="{{$card["thumb"]}}" alt="comic" />
          </div>
          <!--titolo-->
          <div>
            <div class="position-absolute hoverme justify-content-center align-items-center">
              <form action="{{ route('comic.destroy', ["id" => $card->id, "force" => true]) }}" method="POST" class="d-inline-block">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete permanently</button>
              </form>
              </a>
            </div>
          </div>
        </div>
        @endforeach  
      </div>
    </div>

  </div>
@endsection
