@extends('layouts.master')

@section('title')
Halaman Cast
@endsection

@section('content')
<h1 class="textprimary">{{ $cast->name }}</h1>
<h2> {{$cast->age}} </h2>
<p> {{$cast->bio}} </p>
<a href="/casts" class="btn btn-secondary">Back</a>
@endsection