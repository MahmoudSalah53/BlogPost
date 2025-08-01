<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
