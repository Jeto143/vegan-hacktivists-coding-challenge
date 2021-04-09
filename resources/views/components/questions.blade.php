<ul class="list-group list-group-flush">
    @foreach ($questions as $question)
        <li class="list-group-item bg-light">
            {{ $question->title }}

            @if ($answerCount = $question->answers->count())
                <span class="badge bg-info float-end">{{ $answerCount }} {{ Str::plural('answer', $answerCount) }}</span>
            @endif
        </li>
    @endforeach
</ul>
