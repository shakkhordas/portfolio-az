<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Activity') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('activities.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="online_judge" class="block text-sm font-medium mb-1">Online Judge</label>
                <input type="text" id="online_judge" name="online_judge"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4">
                <label for="solve_count" class="block text-sm font-medium mb-1">Solve Count</label>
                <input type="number" id="solve_count" name="solve_count" min="0"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4">
                <label for="profile_link" class="block text-sm font-medium mb-1">Profile Link</label>
                <input type="url" id="profile_link" name="profile_link"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="flex gap-4">
                <a href="{{ route('activities.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
