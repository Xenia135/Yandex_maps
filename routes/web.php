<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarkController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

Route::resource('marks', MarkController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/marks.index', function () {
        return view('marks');
    })->name('marks');
});

Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

Route::get('/locations/{userId}', [AdminController::class, 'getLocations'])->name('locations');

//Route::resource('admin', AdminController::class);


/*Route::middleware(isAdmin::class)->group(function () {
    Route::get('/admin.index',  function () {
        return view('admin');
})->name('admin');
});*/

/*Route::middleware('IsAdmin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});*/