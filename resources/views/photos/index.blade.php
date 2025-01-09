@extends('layouts.app')

@section('content')

<h1>Gallery Photo</h1>

<div class="row">
    @foreach ($photos as $photo)
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">

            <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" height="200px" class="card-img-top" alt="Photo Image">
            <div class="card-body">
                <h5 class="card-title">{{$photo->name}}</h5>
                <p class="card-text">{{$photo->description}}</p>
                <a href="{{route('photos.show' , $photo->id)}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection