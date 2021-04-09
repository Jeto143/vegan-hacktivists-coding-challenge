<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;

final class QuestionController extends Controller
{
    public function index(): View
    {
        return view('question-index', [
            'questions' => Question::all()->sortByDesc('created_at'),
        ]);
    }
}
