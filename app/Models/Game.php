<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'Games';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 
        'cover_art', 
        'developer', 
        'release_year',
        'genre',
    ];

}
