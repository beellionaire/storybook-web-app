<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subgenre extends Model
{
    protected $fillable = ['genre_id', 'name', 'slug'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
