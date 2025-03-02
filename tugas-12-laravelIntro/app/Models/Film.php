<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = ['title', 'summary', 'release_year', 'poster', 'genre_id'];
    public function genre()
    {
        return $this->belongsTo(genres::class, 'genre_id');
    }

    public function listreview()
    {
        return $this->hasMany(review::class, 'film_id');
    }
}
