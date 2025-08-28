<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-1">Title</label>
                <input type="text" id="title" name="title"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required value="{{ old('title', $project->title) }}" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium mb-1">Role</label>
                <textarea id="role" name="role" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">{{ old('role', $project->role) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="technologies" class="block text-sm font-medium mb-1">Technologies</label>
                <textarea id="technologies" name="technologies" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" placeholder="e.g. PHP, Laravel, Vue.js">{{ old('technologies', $project->technologies) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium mb-1">Type</label>
                <select id="type" name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="Personal" {{ old('type', $project->type) == 'Personal' ? 'selected' : '' }}>Personal</option>
                    <option value="Professional" {{ old('type', $project->type) == 'Professional' ? 'selected' : '' }}>Professional</option>
                </select>
            </div>
            <div class="mb-4" id="experience-dropdown" style="display:none;">
                <label for="experience_id" class="block text-sm font-medium mb-1">Company (Experience)</label>
                <select id="experience_id" name="experience_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                    <option value="" disabled>Select Company</option>
                    @foreach($experiences as $exp)
                        <option value="{{ $exp->id }}" {{ old('experience_id', $project->experience_id) == $exp->id ? 'selected' : '' }}>{{ $exp->company }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium mb-1">Link</label>
                <input type="url" id="link" name="link"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="{{ old('link', $project->link) }}" />
            </div>
            <div class="flex gap-4">
                <a href="{{ route('projects.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Update</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const typeSelect = document.getElementById('type');
                const experienceDropdown = document.getElementById('experience-dropdown');
                function toggleExperienceDropdown() {
                    if (typeSelect.value === 'Professional') {
                        experienceDropdown.style.display = '';
                    } else {
                        experienceDropdown.style.display = 'none';
                        document.getElementById('experience_id').value = '';
                    }
                }
                typeSelect.addEventListener('change', toggleExperienceDropdown);
                toggleExperienceDropdown(); // Initial state
            });
        </script>
    @endpush
</x-app-layout>
