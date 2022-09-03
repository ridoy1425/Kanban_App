<?php

use App\Http\Controllers\KanbanController;
use Illuminate\Support\Facades\Route;



Route::get('/', [KanbanController::class, 'index']);
Route::post('/store', [KanbanController::class, 'store']);
Route::get('/in-progress/{id}', [KanbanController::class, 'inProgress'])->name('progress');
Route::get('/todo/{id}', [KanbanController::class, 'todo'])->name('todo');
Route::get('/task-done/{id}', [KanbanController::class, 'taskDone'])->name('task_done');
Route::get('/delete/{id}', [KanbanController::class, 'delete'])->name('delete');
