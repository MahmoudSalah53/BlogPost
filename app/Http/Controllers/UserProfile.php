<?php

namespace App\Http\Controllers;

class UserProfile extends Controller
{
    public function index ()
    {
        return view('profile.index');
    }

    public function savedPosts ()
    {
        return view('profile.saved-posts');
    }

    public function likedPosts ()
    {
        return view('profile.liked-posts');
    }

    public function myComments ()
    {
        return view('profile.my-comments');
    }

    public function recentlyViewed ()
    {
        return view('profile.recently-viewed');
    }

    public function following ()
    {
        return view('profile.following');
    }

    public function membership ()
    {
        return view('profile.membership');
    }
}
