<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\UserProfile;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

// public routs
Route::controller(PublicPagesController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

// posts routes
Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index')->name('posts.index');
    Route::get('posts/{post:slug}', 'show')->name('posts.show');
});

// categories routes
Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index')->name('categories.index');
});

// authors routes
Route::controller(AuthorController::class)->group(function () {
    Route::get('authors', 'index')->name('authors.index');
});

// membership routes
Route::controller(MembershipController::class)->group(function () {
    Route::get('memberships', 'index')->name('membership.index');
});

// User profile routs
Route::middleware(['auth'])->group(function () {
    Route::controller(UserProfile::class)->group(function () {

        Route::get('/profile', 'index')->name('profile');
        Route::get('saved-posts', 'savedPosts')->name('saved-posts');
        Route::get('liked-posts', 'likedPosts')->name('liked-posts');
        Route::get('my-comments', 'myComments')->name('my-comments');
        Route::get('following', 'following')->name('following');
        Route::get('recently-viewed', 'recentlyViewed')->name('recently-viewed');
        Route::get('membership', 'membership')->name('membership');
    });

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// test stripe
Route::get('checkout', function(){

})->name('checkout');
Route::post('/stripe/webhook', function() {
    return;
})->name('checkout.pay');

require __DIR__ . '/auth.php';
