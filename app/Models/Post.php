<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'status',
        'author_id'
    ];

    public function author ()
    {
        return $this->belongsTo(User::class, 'author_id')->where('role', 'author');
    }

    public function categories ()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function savedByUsers ()
    {
        return $this->belongsToMany(User::class, 'saved_posts');
    }

    public function likedByUsers ()
    {
        return $this->belongsToMany(User::class, 'like_posts');
    }
}
