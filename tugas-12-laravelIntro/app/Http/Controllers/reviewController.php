<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{
    public function store(Request $request, $film_id) {
    $request->validate([
        'content' => 'required|min:3',
        'point' => 'required|integer|min:1|max:5',
    ],
    [
        'required' => 'Inputan :attribute Komentar harus diisi!',
        'min' => 'Inputan :attribute Komentar minimal 3 karakter!',
    ]);

    $user_id = Auth::id();

    $review = new review; 
 
        $review->content = $request['content'];
        $review->point = $request['point'];
        $review->user_id = $user_id;
        $review->film_id = $film_id;
 
        $review->save();
 
        return redirect('/film/' . $film_id);
}
}
