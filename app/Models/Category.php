<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Mendaftarkan kolom yang diizinkan untuk diisi melalui form
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // Relasi: Satu kategori bisa memiliki banyak buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
