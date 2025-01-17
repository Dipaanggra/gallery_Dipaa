<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Album') }}
        </h2>
    </x-slot>

    <section class="container py-5 mx-auto text-center">
        <div class="py-5">
            <div class="max-w-lg mx-auto">
                <h1 class="text-3xl font-light">{{ $album->name }}</h1>
                <p class="text-lg text-gray-500">{{ $album->description }}</p>
                <p>
                    <a href="/photo/upload/{{ $album->id }}" class="px-4 py-2 my-2 text-white bg-blue-500 rounded">Upload Photo</a>
                    <a href="/albums" class="px-4 py-2 my-2 text-white bg-gray-500 rounded">Back</a>
                </p>
            </div>
        </div>
    </section>
    @if (count($album->photos) > 0)

        <div class="flex flex-wrap -mx-2">
            @foreach ($album->photos as $photo)
                <div class="w-full px-2 mb-4 sm:w-1/2 md:w-1/3">
                    <div class="overflow-hidden bg-white rounded-lg shadow-md">

                        <img src="/storage/albums/{{ $album->id }}/{{ $photo->photo }}" class="object-cover w-full h-48" alt="photo Image">
                        <div class="p-4">
                            <h5 class="text-xl font-semibold">{{ $photo->name }}</h5>
                            <p class="text-gray-600">{{ $photo->description }}</p>
                            <a href="{{ route('photos.show', $photo->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No photos to display</p>
    @endif
</x-app-layout>
