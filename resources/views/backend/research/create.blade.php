<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Research') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('research.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-1">Title</label>
                <input type="text" id="title" name="title"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4">
                <label for="abstract" class="block text-sm font-medium mb-1">Abstract</label>
                <textarea id="abstract" name="abstract" rows="3"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="mb-4">
                <label for="keywords" class="block text-sm font-medium mb-1">Keywords</label>
                <input type="text" id="keywords" name="keywords"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" placeholder="e.g. AI, ML, Data Science" />
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium mb-1">Role</label>
                <input type="text" id="role" name="role"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium mb-1">Status</label>
                <select id="status" name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Published">Published</option>
                </select>
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="start_date" class="block text-sm font-medium mb-1">Start Date</label>
                    <input type="date" id="start_date" name="start_date"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-sm font-medium mb-1">End Date</label>
                    <input type="date" id="end_date" name="end_date"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium mb-1">Link</label>
                <input type="url" id="link" name="link"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="flex gap-4">
                <a href="{{ route('research.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const statusSelect = document.getElementById('status');
                const endDateInput = document.getElementById('end_date');

                function toggleEndDate() {
                    if (statusSelect.value === 'Ongoing') {
                        endDateInput.value = '';
                        endDateInput.disabled = true;
                        endDateInput.classList.add('bg-gray-100');
                    } else {
                        endDateInput.disabled = false;
                        endDateInput.classList.remove('bg-gray-100');
                    }
                }

                statusSelect.addEventListener('change', toggleEndDate);
                toggleEndDate(); // Initial state
            });
        </script>
    @endpush
</x-app-layout>
