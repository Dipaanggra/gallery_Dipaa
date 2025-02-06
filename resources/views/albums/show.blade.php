<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Details Album') }}
        </h2>
    </x-slot>

    <section class="container py-5 mx-auto text-center">
        <div class="py-5">
            <div class="max-w-lg mx-auto">
                <h1 class="text-3xl font-light">{{ $album->name }}</h1>
                <p class="text-lg text-gray-500">{{ $album->description }}</p>
                <div class="flex items-center justify-center gap-2">
                    <a href="/photo/upload/{{ $album->id }}"
                        class="px-4 py-2 my-2 text-white bg-blue-500 rounded hover:bg-blue-600">Upload Photo</a>
                    <a href="/albums" class="px-4 py-2 my-2 text-white bg-gray-500 rounded hover:bg-gray-600">Back</a>
                    <form action="{{ route('albums.destroy', $album) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete
                        </button>
                    </form>
                    <a href="{{ route('albums.edit', $album) }}" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600"> Edit
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if (count($album->photos) > 0)
        <div class="grid grid-cols-4 gap-4 mx-auto my-6 max-w-7xl sm:px-6 lg:px-8">
            @foreach ($album->photos as $photo)
                <div class="p-4 bg-white rounded-lg shadow-lg">
                    <img src="/storage/albums/{{ $album->id }}/{{ $photo->photo }}"
                        class="object-cover w-full h-48 rounded" alt="Photo Image">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold">{{ $photo->name }}</h5>
                        <p class="mb-6 text-gray-600">{{ $photo->description }}</p>
                        <a href="{{ route('photos.show', $photo->id) }}"
                            class="px-4 py-2 text-white bg-yellow-400 rounded hover:bg-yellow-500">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No photos to display</p>
    @endif
</x-app-layout>
