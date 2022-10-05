<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at','updated_at','title', 'content', 'file_path'];

//    public function category(){
//        return $this->belongsTo(Category::class);
//    }
}
