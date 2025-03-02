@extends('layouts.master')

@section('title')
Edit Film
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

<form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>title</label> <br>
        <input type="string" class="form-controlname" name="title" value="{{old('title', $film->title)}}">
      </div>
      <div class="form-group">
        <label>summary</label> <br>
        <textarea name="summary" class="form-control" cols="30" rows="10">{{ old('summary', $film->summary) }}</textarea>
        <div class="form-group">
            <label>Release Year</label> <br>
            <input type="string" class="form-controlname" name="release_year" value="{{old('release_year', $film->release_year)}}">
          </div>
        </div>
        <div class="form-group">
          <label>poster</label> <br>
          <input type="file" name="poster" id="poster" required>
        </div>
        <div class="form-group">
          <label>Pilih Genre</label>
          <select name="genre_id" id="" class="from-control">
            <option value="">Pilih Genre </option>
            @forelse ($genres as $item)
            @if ($item->id === $film->genre_id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>  
            @endif
            @empty
            <option value="">Belum ada genre</option>
            
            @endforelse
          </select>
        </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection