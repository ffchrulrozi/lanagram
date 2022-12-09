<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    protected $fillable = ["user_id","title","description"];

    public function previewComments()
    {
        return $this->hasMany(Comment::class);
    }
}
