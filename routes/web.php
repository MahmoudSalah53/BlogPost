<?php

use App\Http\Controllers\UserProfile;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// User profile routs
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

    // User Profile Routes
    Route::controller(UserProfile::class)->group(function () {

        Route::get('saved-posts', 'savedPosts')->name('saved-posts');
        Route::get('liked-posts', 'likedPosts')->name('liked-posts');
        Route::get('my-comments', 'myComments')->name('my-comments');
        Route::get('recently-viewed', 'recentlyViewed')->name('recently-viewed');
    });

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
