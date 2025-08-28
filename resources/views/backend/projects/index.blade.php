<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-6 px-4 py-3 bg-green-100 text-green-800 rounded shadow text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-center mb-8">
            <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition font-semibold">Create Project</a>
        </div>
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                            @if ($project->technologies)
                                <span class="text-sm text-gray-400">{{ $project->technologies }}</span>
                            @endif
                        </div>
                        <div class="mt-6 flex justify-between">
                            <a href="#" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600">View</a>
                            <a href="{{ route('projects.edit', $project) }}" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg shadow hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
