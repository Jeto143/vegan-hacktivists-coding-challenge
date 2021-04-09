<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class AnswerController extends Controller
{
    public function store(Request $request, Question $question): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|min:5'
        ]);

        $answer = new Answer();
        $answer->text = $request->text;
        $question->answers()->save($answer);

        return response()
            ->redirectToRoute('questions.show', [$question->idSlug])
            ->with('message.success', 'Answer successfully posted!');
    }
}
