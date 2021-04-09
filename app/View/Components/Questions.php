<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Questions extends Component
{
    public iterable $questions;

    public function __construct(iterable $questions)
    {
        $this->questions = $questions;
    }

    public function render(): View
    {
        return view('components.questions');
    }
}
