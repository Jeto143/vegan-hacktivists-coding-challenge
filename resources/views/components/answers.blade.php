<ul class="list-group list-group-flush">
    @foreach ($answers as $answer)
        <div class="bg-light mb-4 p-4">{!! nl2br(e($answer->text)) !!}</div>
    @endforeach
</ul>
