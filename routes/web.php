<?php

use App\Livewire\Navigations\SavedPosts;
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
        return view('profile');
    })->name('profile');

    // posts section
    Route::get('saved-posts', SavedPosts::class)->name('saved-posts');
    Route::get('liked-posts', fn () => 'Hello world')->name('liked-posts');
    Route::get('my-comments', fn () => 'Hello world')->name('my-comments');
    Route::get('recently-viewed', fn () => 'Hello world')->name('recently-viewed');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
