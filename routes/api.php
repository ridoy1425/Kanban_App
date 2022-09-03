<?php

use App\Http\Controllers\KanbanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/task', KanbanApiController::class);
Route::get('/s', function () {
    return "something";
});
