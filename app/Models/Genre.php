<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name', 'slug'];

    public function subgenres()
    {
        return $this->hasMany(Subgenre::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
