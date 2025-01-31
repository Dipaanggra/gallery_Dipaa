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
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
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
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
