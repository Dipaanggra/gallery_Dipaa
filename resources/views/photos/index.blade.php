<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Albums') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-4 gap-4 mx-auto my-6 max-w-7xl sm:px-6 lg:px-8">
        @foreach ($photos as $photo)
            <div class="p-4 bg-white rounded-lg shadow-lg">
                <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" height="200px" class="rounded"
                    alt="Album Image">
                <div class="card-body">
                    <h5 class="text-xl font-bold">{{ $photo->name }}</h5>
                    <p class="mb-6">{{ $photo->description }}</p>
                    <a href="{{ route('albums.show', $photo->id) }}"
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded-lg">View</a>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
