<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $fillable = ["name"];

    public function listfilm()
    {
        return $this->hasMany(Film::class, 'genre_id');
    }
}
