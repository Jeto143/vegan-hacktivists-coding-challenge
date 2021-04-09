<form method="post" action="{{ route('questions.answers.store', [$question]) }}">
    @csrf

    <div class="mt-3 mb-3">
        <label for="inputAnswer" class="form-label visually-hidden">Your answer:</label>
        <textarea class="form-control @error('text') is-invalid @enderror" rows="7" id="inputAnswer"
                name="text" autofocus required>{{ old('text') }}</textarea>
        @error('text')
        <div class="invalid-feedback visible">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>
