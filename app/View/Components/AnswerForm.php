<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class AnswerForm extends Component
{
    public Question $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function render(): View
    {
        return view('components.answer-form');
    }
}
