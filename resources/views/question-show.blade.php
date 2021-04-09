<x-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $question->title }}</li>
        </ol>
    </nav>

    <div class="mt-5">
        <h3 class="mb-3">Answers</h3>

        <x-answers :answers="$answers"/>
    </div>
</x-layout>
