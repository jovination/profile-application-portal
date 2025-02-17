<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('apply');
});

Route::get('/apply', [ProfileController::class, 'showForm'])->name('apply');
Route::post('/apply', [ProfileController::class, 'submitForm']);

Route::get('/success', function () {
    $profileId = session('profile_id');
    return view('success', compact('profileId'));
})->name('success');

Route::get('/profile/{id}', [ProfileController::class, 'viewProfile'])->name('profile.view');