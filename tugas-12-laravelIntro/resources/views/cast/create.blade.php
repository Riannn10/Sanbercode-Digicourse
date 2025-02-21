@extends('layouts.master')

@section('title')
Add Cast
@endsection
@section('content')
<form action="/casts" method="post">
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
    <div class="form-group">
      <label>Cast Name</label> 
      <input type="text" class="form-control" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="age" class="form-control" name="age" value="{{old('age')}}">
    </div>
    <label>Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10" value="{{old('bio')}}"></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection