<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Test Score') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('test-scores.update', $testScore) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-1">Test Name</label>
                <input type="text" id="name" name="name"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="{{ old('name', $testScore->name) }}" required />
            </div>
            <div class="mb-4">
                <label for="score" class="block text-sm font-medium mb-1">Score</label>
                <textarea id="score" name="score" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required>{{ old('score', $testScore->score) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="test_taken" class="block text-sm font-medium mb-1">Test Taken Date</label>
                <input type="date" id="test_taken" name="test_taken"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="{{ old('test_taken', $testScore->test_taken ? $testScore->test_taken : '') }}" />
            </div>
            <div class="flex gap-4">
                <a href="{{ route('test-scores.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
