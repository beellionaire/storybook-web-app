<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'description',
        'cover_image',
        'language',
        'story_type',
        'copyright',
        'is_mature',
        'target_audience',
        'status',
        'views_count'
    ];

    protected $casts = [
        'is_mature' => 'boolean',
    ];

    // Relasi Utama
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    // Relasi Many-to-Many
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function subgenres()
    {
        return $this->belongsToMany(Subgenre::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
