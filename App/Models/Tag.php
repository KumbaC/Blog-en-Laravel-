<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

public function getRouteKeyName()
{
return 'slug';
}

    //Relación muchos a muchos 
    public function Posts(){
        return $this->belongsToMany(Post::class);
    }
}
