<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);

Route::get('students_export', [StudentController::class, 'export'])->name('students.export');