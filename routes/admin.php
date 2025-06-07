<?php

// You can define admin routes here

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
});
