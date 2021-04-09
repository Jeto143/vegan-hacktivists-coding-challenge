<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

final class QuestionController extends Controller
{
    public function index(): View
    {
        return view('question-index', [
            'questions' => Question::all()->sortByDesc('created_at'),
            'suggestedQuestionTitle' => Arr::random(config('questions.suggestions'))
        ]);
    }

    public function show(string $slug): View
    {
        $question = Question::findOrFail((int)$slug);

        return view('question-show', [
            'question' => $question,
            'answers' => $question->answers->sortBy('created_at')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:5|ends_with:?'
        ]);

        $question = new Question();
        $question->title = $request->title;
        $question->save();

        return response()
            ->redirectToRoute('questions.show', [$question->idSlug])
            ->with('message.success', 'Question successfully posted!');
    }
}
