@extends('layouts.master')

@section('title')
    Halaman Genre
@endsection

@section('content')
<a href="genres/create">Tambah Genre</a> <br> <br>
<table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
    </tr>
</thead>
<tbody>
    @forelse ($genres as $key=>$value)
        <tr>
            <td>{{$key + 1}}</th>
            <td>{{$value->name}}</td>
            <td>
                            <a href="/genres/{{$value->id}}" class="btn btn-info">Detail</a>
                            <a href="/genres/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                            <form action="/genres/{{$value->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>  
                @endforelse 
            </tbody>
        </table>             

@endsection
