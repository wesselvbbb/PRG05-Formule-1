<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'file_path', 'active'];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('title', 'like', '%' . request('search') . '%'))
        ->orWhere('content', 'like', '%' . request('search') . '%');
    }
}
