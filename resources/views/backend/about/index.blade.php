<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-6 px-4 py-3 bg-green-100 text-green-800 rounded shadow text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-center mb-8">
            <a href="{{ route('about.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition font-semibold">Create About</a>
        </div>
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($abouts as $about)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col justify-between">
                        <div class="flex justify-center items-center h-48 mb-4">
                            @if($about->image)
                                <img src="{{ asset($about->image) }}" alt="About Image" class="object-contain h-full w-full rounded-lg" />
                            @else
                                <span class="text-gray-400 italic">No image</span>
                            @endif
                        </div>
                        <div>
                            @if($about->title)
                                <h3 class="text-xl font-semibold mb-2">{{ $about->title }}</h3>
                            @endif
                            @if($about->description)
                                <p class="mt-2 text-sm text-gray-600">{{ $about->description }}</p>
                            @endif
                        </div>
                        <div class="mt-6 flex justify-between">
                            <a href="#" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600">View</a>
                            <a href="{{ route('about.edit', $about) }}" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600">Edit</a>
                            <form action="{{ route('about.destroy', $about) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this about record?');" style="display:inline;">
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
