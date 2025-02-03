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

<body class="font-sans antialiased" x-init="window.toast = function(message, options = {}) {
    let description = '';
    let type = 'default';
    let position = 'top-center';
    let html = '';
    if (typeof options.description != 'undefined') description = options.description;
    if (typeof options.type != 'undefined') type = options.type;
    if (typeof options.position != 'undefined') position = options.position;
    if (typeof options.html != 'undefined') html = options.html;

    window.dispatchEvent(new CustomEvent('toast-show', { detail: { type: type, message: message, description: description, position: position, html: html } }));
}">
    @php
        $navItems = [
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-album">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <polyline points="11 3 11 11 14 8 17 11 17 3" />
                    </svg>',
                'url' => '/albums',
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-images">
                        <path d="M18 22H4a2 2 0 0 1-2-2V6" />
                        <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18" />
                        <circle cx="12" cy="8" r="2" />
                        <rect width="16" height="16" x="6" y="2" rx="2" />
                    </svg>',
                'url' => '/photo',
            ],
        ];
    @endphp
    <div class="flex flex-col justify-between min-h-screen">
        <nav
            class="fixed top-0 left-0 z-50 flex-col items-center justify-between hidden w-16 h-screen text-black bg-white border-r-2 sm:flex">
            <x-application-logo class="w-8 h-8 mt-5" />
            <ul class="flex flex-col items-center justify-center gap-4">
                @foreach ($navItems as $nav)
                    <li class="rounded-lg hover:bg-gray-800 hover:text-white">
                        <a href="{{ $nav['url'] }}" class="flex items-center justify-center p-2">
                            {!! $nav['icon'] !!}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class=""></div>
        </nav>
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    window.toast("{{ addslashes(session('success')) }}", {
                        type: 'success',
                        position: 'top-center'
                    });
                });
            </script>
        @endif

        <x-toast />
        <div class="sm:pl-16">

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
        <nav
            class="sticky bottom-0 flex items-center justify-center w-screen h-16 text-black bg-white border-t-2 sm:hidden">
            <ul class="flex items-center justify-center gap-4">
                @foreach ($navItems as $nav)
                    <li class="rounded-lg hover:bg-gray-800 hover:text-white">
                        <a href="{{ $nav['url'] }}" class="flex items-center justify-center p-2">
                            {!! $nav['icon'] !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</body>

</html>
