<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;
    
    public static function scopeFilter($query, $filters) {
        if (isset($filters['query']) && $filters['query']) {
            $query->where('title','LIKE','%'.$filters['query'].'%')->
            orWhere('body','LIKE','%'.$filters['query'].'%');
        };

        if (isset($filters['category_id']) && $filters['category_id']) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->where('id', $filters['category_id']);
            });
        }
        if (isset($filters['user_id']) && $filters['user_id']) {
            $query->whereHas('user', function ($query) use ($filters) {
                $query->where('id', $filters['user_id']);
            });
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
}
}