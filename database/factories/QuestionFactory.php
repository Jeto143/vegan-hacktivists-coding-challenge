<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

final class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->regexify('^[a-z ]{4,50}\?$')
        ];
    }
}
