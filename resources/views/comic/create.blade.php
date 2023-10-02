@extends('layouts.public')
@section("title", "DC Comics - Form")


@section('content')
<div class="container text-white">
  <form action="{{ route('comic.store') }}" method="POST">
    @csrf()
    <!--Title-->
    <div class="mb-3"><label class="form-label">Title:</label><input type="text" class="form-control" name="title"></div>
    <!--Description-->
    <div class="mb-3"><label class="form-label">Description:</label><textarea class="form-control" name="description"></textarea></div>
    <!--Thumb-->
    <div class="mb-3"><label class="form-label">Thumbnail:</label><input type="text" class="form-control" name="thumb"></div>
    <!--Price-->
    <div class="mb-3"><label class="form-label">Price:</label><input type="text" class="form-control" name="price"></div>
    <!--Series-->
    <div class="mb-3"><label class="form-label">Series:</label><input type="text" class="form-control" name="series"></div>
    <!--Sale date-->
    <div class="mb-3"><label class="form-label">Sale date:</label><input type="date" class="form-control" name="sale_date"></div>
    <!--Type-->
    <div class="mb-3"><label class="form-label">Type</label><input type="text" class="form-control" name="type"></div>
    <!--Artist & Writers-->
    <div class="mb-3"><label class="form-label">Artists</label><input type="text" class="form-control" name="artists"></div>
    <div class="mb-3"><label class="form-label">Writers</label><input type="text" class="form-control" name="writers"></div>


    <a class="btn btn-secondary" href="{{ route("comic.index") }}">Cancel</a>
    <button class="btn btn-primary">Save</button>
  </form>
</div>
@endsection