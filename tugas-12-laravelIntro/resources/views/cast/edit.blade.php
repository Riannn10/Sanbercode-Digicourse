@extends('layouts.master')

@section('title')
Edit Cast
@endsection
@section('content')
<form action="/casts/{{$cast->id}}" method="post">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Cast Name</label> 
      <input type="text" class="form-control" name="name" value="{{old('name', $cast->name)}}">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="age" class="form-control" name="age" value="{{old('age', $cast->age)}}">
    </div>
    <label>Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10"> {{old('bio', $cast->bio)}}</textarea>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection