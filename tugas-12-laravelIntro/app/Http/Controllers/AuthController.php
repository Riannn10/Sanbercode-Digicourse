<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function welcome(Request $request) {
        $First_Name = $request->input('First_Name');
        $Last_Name = $request->input('Last_Name');
        return view('welcome', ["First_Name" => $First_Name, "Last_Name" => $Last_Name]); 
        
    }
}
