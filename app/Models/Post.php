<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['id', 'user_id', 'title', 'category_id', 'slug', 'detail', 'image', 'status'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
