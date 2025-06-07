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
        $userSavedPosts = auth()->user()->savedPosts()->latest()->get();
        return view('profile.saved-posts', ['savedPosts' => $userSavedPosts]);
    }

    public function likedPosts ()
    {
        $userLikedPosts = auth()->user()->likedPosts()->latest()->get();
        return view('profile.liked-posts', ['likedPosts' => $userLikedPosts]);
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
