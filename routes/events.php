<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


// Route::resource('/events', EventController::class)->middleware('auth')->middleware('guest:login');
Route::middleware('auth')->group(function () {
    Route::resource('/events', EventController::class);
});

?>