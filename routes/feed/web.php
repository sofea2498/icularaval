<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;


// Route::get('/feeds', function () { 
//     return view('pages.feed.index');})->name('feeds');

    Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

    Route::post('/feeds/create', [FeedController::class, 'create'])->name('feed.create');

    Route::put('/feeds/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

    Route::get('/feeds/show/{feed}', [FeedController::class, 'show'])->name('feed.show');

?>
