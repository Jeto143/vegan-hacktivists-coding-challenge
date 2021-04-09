<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Answer;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Answers extends Component
{
    /** @var iterable|Answer[]  */
    public iterable $answers;

    /**
     * @param iterable|Answer[] $answers
     */
    public function __construct(iterable $answers)
    {
        $this->answers = $answers;
    }

    public function render(): View
    {
        return view('components.answers');
    }
}
