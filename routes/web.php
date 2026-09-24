<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/number/{number}", [AccueilController::class, 'index'])->name('page');

Route::get("/addition/{a?}/{b?}", [MathController::class, 'addition'])->name('addition');
Route::get("/soustraction/{a?}/{b?}", [MathController::class, 'soustraction'])->name('soustraction');
Route::get("/multiplication/{a?}/{b?}", [MathController::class, 'multiplication'])->name('addition');
Route::get("/division/{a?}/{b?}", [MathController::class, 'division'])->name('division');

Route::resource('/test', TestController::class)->only('index');
Route::middleware('auth')->group(function () {
    Route::resource('/absence', AbsenceController::class);
    Route::resource('/salarie', UserController::class)->except('show')->middleware('admin');
});
