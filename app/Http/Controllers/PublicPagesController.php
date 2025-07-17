<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PublicPagesController extends Controller
{
    public function index()
    {
        $newPosts = Post::withCount(['comments', 'likedByUsers'])
            ->where('status', 'published')
            ->latest()
            ->limit(6)
            ->get();

        $popularCategories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->limit(5)
            ->get();

        $popularPosts = Post::withCount(['comments', 'likedByUsers'])
            ->where('status', 'published')
            ->orderByDesc('liked_by_users_count')
            ->limit(3)
            ->get();
            
        return view('public.index', compact('newPosts', 'popularCategories', 'popularPosts'));
    }
}
