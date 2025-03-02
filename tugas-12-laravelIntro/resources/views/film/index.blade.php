@extends('layouts.master')

@section('title')
Halaman Film
@endsection

@section('content')
<a href="/film/create" class="btn btn-sm btn-primary mb-3">Add Film</a>

<div class="row"> 
  @foreach ($film as $item)
  <div class="col-4">
    <div class="card" style="">
          <img src="{{asset('ImagePoster/' . $item->poster)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <span class="badge badge-success">{{$item->genre->name}}</span>
            <h3>{{$item->title}}</h3>
            <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
            <a href="/film/{{$item->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
            @auth
            <div class="row mt-3">
              <div class="col">
                <a href="/film/{{$item->id}}/edit" class="btn btn-warning btn-sm btn-block">Edit</a>
              </div>
              <div class="col">
                <form action="/film/{{$item->id}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                </form>
              </div>
            </div>
            @endauth
          </div>
    </div>
  </div>
  @endforeach
</div>

@endsection