@php
    $navItems = [
        [
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-album">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <polyline points="11 3 11 11 14 8 17 11 17 3" />
                    </svg>',
            'url' => '',
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
            'url' => '',
        ],
    ];
@endphp
<div class="flex-col justify-between">
    {{-- <nav
        class="fixed top-0 left-0 z-50 flex-col items-center justify-between hidden w-16 h-screen text-black bg-white border-r-2 sm:flex">
        <x-application-logo class="w-8 h-8 mt-5" />
        <ul class="flex flex-col items-center justify-center gap-4">
            @foreach ($navItems as $nav)
                <li class="p-2 rounded-lg hover:bg-gray-800 hover:text-white">
                    <a href="{{ $nav['url'] }}">
                        {!! $nav['icon'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class=""></div>
    </nav> --}}
    <div class="flex-1">

        @yield('content')
    </div>
    {{-- <nav class="sticky flex items-center justify-center w-screen h-16 p-4 bg-white">
        <ul class="flex items-center justify-center gap-4">
            @foreach ($navItems as $nav)
                <li class="p-2 rounded-lg hover:bg-gray-800 hover:text-white">
                    <a href="{{ $nav['url'] }}">
                        {!! $nav['icon'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav> --}}

</div>
