<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function category()
    // {
    //     return $this->hasMany(Category::class);
    // }

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orwhere('author', 'like', '%' . $filters['search'] . '%');
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orwhere('author', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }

    // public function rent_log(): MorphToMany
    // {
    //     return $this->morphedByMany(RentLog::class, 'book_logs');
    // }

    public function rent_logs()
    {
        return $this->belongsToMany(RentLog::class, 'book_logs');
    }
}
