<x-layout>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Index</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $question->title }}</li>
      </ol>
    </nav>

    <h2 class="display-5 mb-4">{{ $question->title }}</h2>

    <h3>Your answer</h3>

    <x-answer-form :question="$question"/>

    @if ($answers->count())
        <div class="mt-5">
            <h3 class="mb-3">Previous answers</h3>

            <x-answers :answers="$answers"/>
        </div>
    @endif
</x-layout>
