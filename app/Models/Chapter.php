<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'chapter_number',
        'title',
        'visual_image',
        'content',
        'has_poll',
        'poll_data',
        'status'
    ];

    protected $casts = [
        'has_poll' => 'boolean',
        'poll_data' => 'array', // Otomatis mengubah JSON di database jadi Array di PHP
        'content' => 'array',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
