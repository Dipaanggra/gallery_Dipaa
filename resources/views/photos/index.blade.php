<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Albums') }}
        </h2>
    </x-slot>
    <div class="gap-4 mx-auto my-6 space-y-4 columns-2 md:columns-3 lg:columns-5 max-w-7xl sm:px-6 lg:px-8">
        @foreach ($photos as $photo)
            <div class="relative overflow-hidden bg-white rounded-lg shadow-lg">
                <a href="/photo/{{ $photo->id }}" class="absolute inset-1"></a>
                <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" class="rounded" alt="AlbFum Image">
            </div>
        @endforeach
    </div>

</x-app-layout>
