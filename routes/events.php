<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserEventsAttendeeController;
use App\Models\UserEventsAttendee;
use Illuminate\Support\Facades\Route;


// Route::resource('/events', EventController::class)->middleware('auth')->middleware('guest:login');
Route::middleware('auth')->group(function () {
    Route::resource('/events', EventController::class);
    Route::group(['prefix' => 'events'], function () {
        Route::get('{id}/register', [EventController::class, 'register']);
        Route::post('{id}/attendes', [UserEventsAttendeeController::class, 'storeAttendee']);
    });
});
