<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;


// Route::get('/feeds', function () { 
//     return view('pages.feed.index');})->name('feeds');

    Route::middleware(['auth','log-request'])->group(function()
    {
        Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

        Route::get('/feeds/create', [FeedController::class, 'create'])->name('feed.create');
        Route::post('/feeds/store', [FeedController::class, 'store'])->name('feed.store');

        Route::put('/feeds/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

        Route::get('/feeds/show/{feed}', [FeedController::class, 'show'])->name('feed.show');
    });
    


