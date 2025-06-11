<?php

// Here you can define Author dashboard routes
use App\Http\Controllers\Authors\AuthorController;

Route::prefix('author')->name('author.')->middleware('isAuthor')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
});
