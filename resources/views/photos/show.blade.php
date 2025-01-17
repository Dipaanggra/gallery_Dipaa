<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __($photo->title) }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl">

        <a href="/photo" class="px-4 py-2 m-2 text-white bg-gray-500 rounded hover:bg-gray-600">Back</a>
        <form action="{{ route('photos.destroy', $photo->id) }}" method="post" class="inline-block">
            @csrf
            @method('delete')
            <button type="submit" class="px-4 py-2 m-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
        </form>
        <div class="mt-4">
            <img src="/storage/albums/{{ $photo->album->id }}/{{ $photo->photo }}" alt=""
                class="w-full h-auto max-w-lg">
        </div>
    </div>
</x-app-layout>
