@extends('layouts.master')

@section('title')
Tambah Film
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

<form action="/film" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>title</label> <br>
        <input type="string" class="form-controlname" name="title" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label>summary</label> <br>
        <textarea name="summary" class="form-control" cols="30" rows="10" value="{{old('summary')}}"></textarea>
      </div>
      <div class="form-group">
          <label>Release Year</label> <br>
          <input type="string" class="form-controlname" name="release_year" value="{{old('release_year')}}">
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
            <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
            <option value="">Belum ada genre</option>
            
            @endforelse
          </select>
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection