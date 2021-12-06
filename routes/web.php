<?php

use Illuminate\Support\Facades\Route;
use M4riachi\LaravelComment\Http\Controllers\CommentController;

Route::post('/m4/comment/save', [CommentController::class, 'save'])
    ->name('m4.comment.save')
    ->middleware(['web', 'm4-check-user']);

Route::delete('/m4/comment/{comment}/delete', [CommentController::class, 'delete'])
    ->name('m4.comment.delete')
    ->middleware(['web']);

Route::patch('/m4/comment/{comment}/status', [CommentController::class, 'status'])
    ->name('m4.comment.status')
    ->middleware(['web']);
