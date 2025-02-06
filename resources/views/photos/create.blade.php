<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Photos') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8">
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data"
            class="p-6 space-y-6 bg-white rounded-lg shadow-md">
            @csrf
            @method('post')

            <!-- Input name -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="title" id="title" placeholder="Photo title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Input Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" name="description" id="description" placeholder="Photo description"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Input Photo -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" id="photo"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Hidden Album ID -->
            <input type="hidden" name="album_id" value="{{ $album_id }}">

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 font-semibold text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
