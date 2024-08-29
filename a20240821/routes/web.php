<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('hotels.f1');
});



Route::get('/hotels_f1', [HotelController::class, 'f1'])->name('hotels.f1');
Route::get('/hotels_f2', [HotelController::class, 'f2'])->name('hotels.f2');
Route::get('/hotels_f3', [HotelController::class, 'f3'])->name('hotels.f3');
Route::resource('hotels', HotelController::class);
