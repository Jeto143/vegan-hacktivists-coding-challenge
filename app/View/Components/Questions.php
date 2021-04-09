<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Questions extends Component
{
    /** @var iterable|Question[]  */
    public iterable $questions;

    /**
     * @param iterable|Question[] $questions
     */
    public function __construct(iterable $questions)
    {
        $this->questions = $questions;
    }

    public function render(): View
    {
        return view('components.questions');
    }
}
