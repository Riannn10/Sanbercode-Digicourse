@extends('layouts.master')

@section('title')
 Genre page
@endsection
@section('content')

<a href="/genres" class="btn btn-secondary">Back</a> <br> <br>
 <h1 class="text-primary">{{ $genres->name }}</h1>
 
 <h4>List Film</h4>
 <div class="row">
    @forelse ($genres->listfilm as $item )
        <div class="col-4">
       <div class="card" style="">
             <img src="{{asset('ImagePoster/' . $item->poster)}}" class="card-img-top" alt="...">
             <div class="card-body">
               <h3>{{$item->title}}</h3>
               <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
               <a href="/film/{{$item->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
    </div>
    @empty
        <h4>Tidak Ada Film untuk Genre ini</h4>
    @endforelse
              
@endsection