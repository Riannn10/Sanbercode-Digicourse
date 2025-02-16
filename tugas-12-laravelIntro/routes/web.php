<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class,'home']);
Route::get('/daftar', [AuthController::class, 'register']);
route::post('/welcome', [AuthController::class, 'welcome']);
route::get('/master', function() {
    return view ('layouts.master');
});
route::get('/data-table', function(){
    return view ('data-table');
});
route::get('/table', function(){
    return view ('table');
});

