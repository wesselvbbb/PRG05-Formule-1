<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'file_path', ];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function scopeFilter($query){
        if (request('search')){
            if (request('search')){
                $query->where('title', 'like', '%' . request('search' . '%'))
                    ->orWhere('content', 'like', '%' . request('search' . '%'));;
            }
        }
    }
}
