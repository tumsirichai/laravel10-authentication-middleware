<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Laravel\Sanctum\HasApiTokens;

class PostCategory extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['id','name', 'user_id'];

    public function post():hasMany
    {
        return $this->hasMany(Post::class,'category_id');
    }
}
