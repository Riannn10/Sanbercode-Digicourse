    @extends('layouts.master')

    @section('title')
    Halaman Cast
    @endsection

    @section('content')
    <a href="/casts/create" class="btn btn-sm btn-primary mb-3">Add Cast</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
                @forelse ($cast as $casts)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$casts->name}}</td>
                    <td>
                        <form action="/casts/{{$casts->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')">
                            @csrf
                            @method('delete')
                            <a href="/casts/{{$casts->id}}" class="btn btn-sm btn-info">Detaill</a>
                            <a href="/casts/{{$casts->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                    </td>
                </tr>
        @empty
            <tr>
                <th scope="row">Cast Is Empty </th>
            </tr>
        @endforelse
        </tbody>
    </table>
    @endsection