<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class QuestionForm extends Component
{
    public string $suggestedQuestionTitle;

    public function __construct(string $suggestedQuestionTitle)
    {
        $this->suggestedQuestionTitle = $suggestedQuestionTitle;
    }

    public function render(): View
    {
        return view('components.question-form');
    }
}
