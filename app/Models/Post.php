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
        'status'
    ];

    protected $casts = [
        'featured_image' => 'array',
        'status' => PostStatus::class,
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
