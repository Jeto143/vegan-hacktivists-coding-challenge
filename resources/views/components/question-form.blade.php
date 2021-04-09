<form method="post" action="{{ route('questions.store') }}">
    @csrf

    <div class="mt-3 mb-3">
        <label for="inputQuestion" class="form-label visually-hidden">Your question:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputQuestion"
                name="title" placeholder="{{ $suggestedQuestionTitle }}" value="{{ old('title') }}" autofocus required>
        @error('title')
        <div class="invalid-feedback visible">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Ask</button>
</form>
