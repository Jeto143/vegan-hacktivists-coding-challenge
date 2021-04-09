<?php

declare(strict_types=1);

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::resource('questions', QuestionController::class)
    ->only(['index', 'show', 'store']);

Route::resource('questions.answers', AnswerController::class)
    ->only(['store']);

Route::redirect('/', '/questions');
