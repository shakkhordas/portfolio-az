<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('skills.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="skill_type_id" class="block text-sm font-medium mb-1">Skill Type</label>
                <select id="skill_type_id" name="skill_type_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required>
                    <option value="" disabled>Select Skill Type</option>
                    @foreach($skillTypes as $type)
                        <option value="{{ $type->id }}" {{ old('skill_type_id', $skill->skill_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-1">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required value="{{ old('name', $skill->name) }}" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">{{ old('description', $skill->description) }}</textarea>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('skills.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
