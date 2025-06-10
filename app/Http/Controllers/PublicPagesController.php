<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PublicPagesController extends Controller
{
    public function index ()
    {
        $posts = Post::withCount(['comments', 'likedByUsers'])->latest()->limit(6)->get();
        return view('public.index', ['posts' => $posts]);
    }
}
