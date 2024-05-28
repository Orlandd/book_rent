<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class RentLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function users(): MorphToMany
    // {
    //     return $this->morphToMany(User::class, 'user_logs');
    // }

    // public function books(): MorphToMany
    // {
    //     return $this->morphToMany(Book::class, 'book_logs');
    // }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_logs');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_logs');
    }
}