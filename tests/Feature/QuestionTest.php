<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class QuestionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Question::factory()->createMany([[
            'id' => 1,
            'title' => 'Greatest question ever?',
            'created_at' => time() - 10
        ], [
            'id' => 2,
            'title' => 'Random question?',
            'created_at' => time() - 5
        ], [
            'id' => 3,
            'title' => 'What is 2+2?',
            'created_at' => time()
        ]]);

        Answer::factory()->createMany([[
            'question_id' => 1,
            'text' => 'Yes. No question about it.',
            'created_at' => time() - 5
        ], [
            'question_id' => 1,
            'text' => 'Not so sure about this...',
            'created_at' => time()
        ]]);
    }

    /**
     * @test
     */
    public function question_index_should_show_questions_from_newest_to_oldest(): void
    {
        $response = $this->get(route('questions.index'));
        $response->assertOk();
        $response->assertSeeInOrder(['What is 2+2?', 'Random question?', 'Greatest question ever?']);
    }

    /**
     * @test
     */
    public function question_view_should_404_on_non_existent_question(): void
    {
        $response = $this->get(route('questions.show', [4]));
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function question_view_should_show_existent_question(): void
    {
        $response = $this->get(route('questions.show', [3]));
        $response->assertOk();
        $response->assertSee('What is 2+2?');
    }

    /**
     * @test
     */
    public function question_view_should_show_answers_from_oldest_to_newest(): void
    {
        $response = $this->get(route('questions.show', [1]));
        $response->assertOk();
        $response->assertSeeInOrder(['Yes. No question about it.', 'Not so sure about this...']);
    }

    /**
     * @test
     */
    public function question_with_invalid_format_should_fail_to_post(): void
    {
        $response = $this->post(route('questions.store'));
        $response->assertSessionHasErrors('title');

        $response = $this->post(route('questions.store'), ['title' => 'hi?']);
        $response->assertSessionHasErrors('title');

        $response = $this->post(route('questions.store'), ['title' => 'longer but no question mark']);
        $response->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    public function question_with_valid_format_should_post_successfully(): void
    {
        $response = $this->post(route('questions.store'), ['title' => 'Something valid, please?']);
        $response->assertSessionHas('message.success');
    }

    /**
     * @test
     */
    public function answer_to_non_existent_question_should_404(): void
    {
        $response = $this->post(route('questions.answers.store', ['question' => 4]));
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function answer_with_invalid_format_should_fail_to_post(): void
    {
        $response = $this->post(route('questions.answers.store', ['question' => 3]));
        $response->assertSessionHasErrors('text');

        $response = $this->post(route('questions.answers.store', ['question' => 3, 'text' => 'lol']));
        $response->assertSessionHasErrors('text');
    }

    /**
     * @test
     */
    public function answer_with_valid_format_should_post_successfully(): void
    {
        $response = $this->post(route('questions.answers.store', ['question' => 3, 'text' => 'Detailed answer!']));
        $response->assertSessionHas('message.success');
    }
}
