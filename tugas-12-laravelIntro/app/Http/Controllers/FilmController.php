<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Models\Film;
use File;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
       $films = Film::all();

       return view('film.index', ["film" => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = genres::all();

        return view('film.create', ["genres" => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg',
            'genre_id' => 'required|exists:genres,id',
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 3 karakter!',
            'exists' => 'Inputan :attribute tidak terdaftar!',
            'poster' => 'Inputan :attribute harus berupa gambar!',
        ]);

        $posterImageName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('ImagePoster'), $posterImageName);

        $films = new Film; 
 
        $films->title = $request['title'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->poster = $posterImageName;
        $films->genre_id = $request['genre_id'];
 
        $films->save();
 
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $films = Film::find($id);

        return view('film.detail', ["films" => $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $films = Film::find($id);
        $genres = genres::all();

        return view('film.edit', ["film" => $films, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg',
            'genre_id' => 'required|exists:genres,id',
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 3 karakter!',
            'exists' => 'Inputan :attribute tidak terdaftar!',
            'poster' => 'Inputan :attribute harus berupa gambar!',
        ]);

        $films = Film::find($id);

        if($request->has('poster')) {
            File::delete('ImagePoster/' . $films->poster);

            $posterImageName = time() . '.' . $request->poster->extension();

            $request->poster->move(public_path('ImagePoster'), $posterImageName);

            $films->poster = $posterImageName;
        }

        $films->title = $request['title'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->genre_id = $request['genre_id'];
        $films->update();
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $films = Film::find($id);

        if($films->poster) {
            File::delete('ImagePoster/' . $films->poster);
        }

    $films->delete();
    return redirect('/film');
    }
}