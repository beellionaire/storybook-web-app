<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributorRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'age', 'address', 'reason', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
