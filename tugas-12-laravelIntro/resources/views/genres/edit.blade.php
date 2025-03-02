@extends('layouts.master')

@section('title')
Edit Genre
@endsection
@section('content')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <h2>Edit genre {{$genres->name}}</h2>
    <form action="/genres/{{$genres->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Genre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $genres->name) }}" class="form-control" required>
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection