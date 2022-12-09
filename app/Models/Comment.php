<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = ["user_id","post_id","comment"];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
