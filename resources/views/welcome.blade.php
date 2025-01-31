<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white shadow">
        <a href="/albums">
            <div class="flex items-center gap-2">
                <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                <span class="text-2xl font-black text-gray-800">Gallery Mu</span>
            </div>
        </a>
        @auth
        @else
            <ul class="flex space-x-4">
                <li>
                    <a href="/login"
                        class="p-2 font-semibold text-white transition bg-teal-400 rounded-lg hover:bg-teal-500">Login</a>
                </li>
                <li>
                    <a href="/register"
                        class="font-semibold text-gray-700 transition hover:underline hover:text-gray-900">Register</a>
                </li>
            </ul>
        @endauth
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-20 text-center">
        <h1 class="text-4xl font-bold">Welcome to Our Gallery</h1>
        <p class="mt-3 text-gray-600">Explore the collection of beautiful images.</p>
    </div>

    <div class="gap-4 mx-auto my-6 space-y-4 columns-5 max-w-7xl sm:px-6 lg:px-8">
        @foreach ($images as $i)
            <div class="relative">
                <a href="/photo" class="absolute inset-1"></a>
                <img class="rounded-lg" src="/storage/albums/{{ $i->album_id }}/{{ $i->photo }}" alt="">
            </div>
        @endforeach
    </div>

</body>

</html>
