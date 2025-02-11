<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Albums') }}
            </h2>
        </div>
    </x-slot>
    <div class="grid gap-4 mx-auto my-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
        @foreach ($albums as $album)
            <div class="p-4 bg-white rounded-lg shadow-lg">
                <img src="{{ Storage::url('images/' . $album->cover_image) }}" height="200px" class="rounded"
                    alt="Album Image">
                <div class="card-body">
                    <h5 class="mt-4 text-xl font-bold">{{ $album->name }}</h5>
                    <p class="mt-2 mb-6 line-clamp-2">{{ $album->description }}</p>
                    <a href="{{ route('albums.show', $album->id) }}"
                        class="px-4 py-2 font-bold text-white bg-yellow-400 rounded-lg hover:bg-yellow-500">View</a>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
