<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AuthorController extends Controller
{
    public function posts ()
    {
        $posts = Post::where('author_id', auth()->id());
        return view('author.posts', compact('posts'));
    }
}
