<?php

use Illuminate\Support\Facades\Route;
use M4riachi\LaravelComment\Http\Controllers\CommentController;

Route::get('/get-comments', [CommentController::class, 'index']);

Route::post('/m4/comment/save', [CommentController::class, 'save'])->name('m4.comment.save');
