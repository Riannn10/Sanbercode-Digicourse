<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create(){
        return view('cast.create');
    }

        public function store(request $request) {
            $request->validate([
                'name' => 'required|min:3',
                'age' => 'required',
                'bio' => 'required',
            ],
            [
                'required' => 'Inputan :attribute wajib di isi.',
                'min' => 'Minimal 3 Karakter'
            ]);
            DB::table('casts')->insert([
                'name' => $request['name'],
                'age' => $request['age'],
                'bio' => $request['bio'],
            ]);
            return redirect('/casts');
        }

        public function index() {
            $cast = DB::table('casts')->get();

            return view('cast.index', ['cast' => $cast]); 
        }

        public function show($id) {
            $cast = DB::table('casts')->find($id);
            return view('cast.detail', ['cast' => $cast]);
        }

        public function edit($id) {
            $cast = DB::table('casts')->find($id);
            return view('cast.edit', ['cast' => $cast]);
        }

        public function update(request $request, $id) {
            $request->validate([
                'name' => 'required|min:3',
                'age' => 'required',
                'bio' => 'required',
            ],
            [
                'required' => 'Inputan :attribute wajib di isi.',
                'min' => 'Minimal 3 Karakter'
            ]);
            DB::table('casts')
              ->where('id', $id)
              ->update([
                'name' => $request['name'],
                'age' => $request['age'],
                'bio' => $request['bio']
              ]);
              return redirect('/casts');
        }

        public function destroy($id) {
            DB::table('casts')->where('id', $id)->delete();
            return redirect('/casts');
        }
    }
