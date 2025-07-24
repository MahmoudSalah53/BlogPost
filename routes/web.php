<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserProfile;
use App\Livewire\AuthorsList;
use App\Livewire\CategoriesList;
use App\Livewire\PostsList;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

// Public routes
Route::controller(PublicPagesController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('posts', PostsList::class)->name('posts.index');
Route::get('posts/{post:slug}', ShowPost::class)->name('posts.show');

// Categories routes
Route::get('categories', CategoriesList::class)->name('categories.index');

// Authors routes
Route::get('authors', AuthorsList::class)->name('authors.index');

// Membership routes
Route::middleware(['auth'])->group(function () {
    Route::get('/membership', [MembershipController::class, 'index'])->name('membership.index');
    Route::post('/membership/upgrade', [MembershipController::class, 'upgrade'])->name('membership.upgrade');
    Route::get('/checkout', [MembershipController::class, 'checkout'])->name('checkout');
    Route::post('/membership/process-payment', [MembershipController::class, 'processPayment'])->name('membership.process-payment');
    Route::get('/payment/success', [MembershipController::class, 'paymentSuccess'])->name('payment.success');
});

// User profile routes
Route::middleware(['auth'])->group(function () {
    Route::controller(UserProfile::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('saved-posts', 'savedPosts')->name('saved-posts');
        Route::get('liked-posts', 'likedPosts')->name('liked-posts');
        Route::get('my-comments', 'myComments')->name('my-comments');
        Route::get('following', 'following')->name('following');
        Route::get('recently-viewed', 'recentlyViewed')->name('recently-viewed');
    });

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Stripe webhook (must be outside auth middleware)
Route::post('/stripe/webhook', [StripeController::class, 'handleWebhook'])->name('stripe.webhook');

require __DIR__ . '/auth.php';