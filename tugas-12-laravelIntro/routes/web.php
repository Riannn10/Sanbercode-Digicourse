<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\reviewController;
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

Route::middleware(['auth'])->group(function () { 
    // CRUD Cast
    // CREAT DATA
    Route::get('/casts/create',[CastController::class,"create"]);
    Route::post('/casts',[CastController::class,"store"]);
    
    //Read Data
    route::get('/casts', [CastController::class,"index"]);
    route::get('/casts/{casts_id}', [CastController::class,"show"]);
    
    //update data
    route::get('/casts/{casts_id}/edit', [CastController::class,"edit"]);
    route::put('/casts/{casts_id}', [CastController::class,"update"]);
    
    //Delete data
    route::delete('/casts/{casts_id}', [CastController::class, "destroy"]);

    //CRUD Genre
    route::resource('genres', GenresController::class);
    
    route::post('review/{film_id}', [reviewController::class, "store"]);
});


//crud film
route::resource('film', FilmController::class);
Auth::routes();

