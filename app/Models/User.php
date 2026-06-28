<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin, contributor, user
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi
    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }

    public function contributorRequest()
    {
        return $this->hasOne(ContributorRequest::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function readingHistories()
    {
        return $this->hasMany(ReadingHistory::class);
    }

    // Tambahkan relasi ini di dalam class User
    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    // (Opsional) Tambahkan juga relasi untuk progres membaca agar lebih lengkap
    public function readingProgresses()
    {
        return $this->hasMany(ReadingProgress::class);
    }
}
