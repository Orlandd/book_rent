<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_log_id',
        'book_id',
    ];
}
