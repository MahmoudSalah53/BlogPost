<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index ()
    {
        return view('public.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show (Post $post)
    {
        return view('public.posts.show', compact('post'));
    }
}
