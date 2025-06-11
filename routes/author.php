<?php

// Here you can define Author dashboard routes
use Illuminate\Support\Facades\Route;

Route::prefix('author')->name('author.')->middleware('isAuthor')->group(function () {
    Route::get('/', function () {
        return "Hello World";
    });
});
