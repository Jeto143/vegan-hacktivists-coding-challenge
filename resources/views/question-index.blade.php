<x-layout>
    <h2 class="mt-4 mb-3">Your Question</h2>

    <x-question-form :suggestedQuestionTitle="$suggestedQuestionTitle"/>

    <div class="bg-light rounded mt-5 mb-3 p-3">
        <h2 class="mb-3">Previous questions</h2>

        <x-questions :questions="$questions"/>
    </div>
</x-layout>
