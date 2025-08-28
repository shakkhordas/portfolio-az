<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create About') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium mb-1">Image <span class="text-red-500">*</span></label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-1">Title</label>
                <input type="text" id="title" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" value="{{ old('title') }}" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">{{ old('description') }}</textarea>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('about.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
