@extends('layouts.master')

@section('title')
Halaman Film
@endsection

@section('content')
<a href="/film" class="btn btn-secondary">Back</a>
<div class="d-flex justify-content-center"> 
    <img src="{{asset('ImagePoster/' . $films->poster)}}">
</div>
<h1 class="textprimary mt-3">{{ $films->title }}</h1>
<p> {{$films->summary}} </p>

<hr>
<h4 class="text-info">List Review</h4>

@forelse ($films->listreview as $item)
<div class="card">
    <div class="card-header">
      {{$item->user->name}} -Rating: {{$item->point}}
    </div>
    <div class="card-body">
      <p class="card-text">{{$item->content}}</p>
    </div>
  </div>
@empty
    <h4>Tidak Ada Review</h4>
@endforelse

@auth
    
<form action="/review/{{$films->id}}" method="post">
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    <div class="form-group">
        <textarea name="content" id="" cols="30" rows="10" class="from-control" placeholder="Buat Review"></textarea>
        <div class="form-group"> <label for="point">Rating (1-5):</label> <input type="number" name="point" id="point" min="1" max="5" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Sumbit</button>
</form>
@endauth
@endsection