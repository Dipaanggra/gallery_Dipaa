<x-app-layout>
    <div class="relative grid max-w-4xl gap-4 p-2 m-4 mx-auto bg-white border shadow-md sm:grid-cols-2 rounded-3xl">
        <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="photo" class="rounded-2xl">
        <div class="flex flex-col pt-2 pr-2">
            <div class="flex justify-end">
                <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 rounded-full hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                    </button>
                </form>
                <a href="{{ route('photos.edit', $photo) }}">
                    <button class="p-2 rounded-full hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-pencil">
                            <path
                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                            <path d="m15 5 4 4" />
                        </svg>
                    </button>
                </a>
            </div>
            <div class="">
                <p class="text-xl font-semibold">{{ $photo->title }}</p>
                <p class="text-sm">{{ $photo->description }}</p>
            </div>
            <div class="flex items-center gap-4 mt-4">
                <form action="{{ $action }}" method="POST" class="flex items-center gap-2">
                    @csrf
                    @method($liked ? 'DELETE' : 'POST')
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <button>
                        @if ($liked)
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 size-6" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-heart">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-heart">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                        @endif
                    </button>
                    <span class="text-xs">
                        {{ $like_count }}
                    </span>
                </form>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-message-circle">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                    </svg>
                    <span class="text-xs">
                        {{ $photo->comments->count() }}
                    </span>
                </div>
            </div>
            <div class="mt-3 mb-2 overflow-y-auto">
                @foreach ($photo->comments as $comment)
                    <div class="flex flex-col">
                        <div class="flex">
                            <p class="text-sm font-semibold">{{ $comment->user->name }} :</p>
                            <p class="text-sm ms-2">{{ $comment->comment }}</p>
                        </div>
                        <span class="text-xs text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="grid">
                <form action="{{ route('comment.store') }}" class="flex gap-2" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <textarea name="comment" id="comment" placeholder="Comment here"
                        class="flex-1 px-4 py-2 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-600 rounded-3xl"
                        style="field-sizing: content"></textarea>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-send">
                            <path
                                d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                            <path d="m21.854 2.147-10.94 10.939" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <a href="/photo" class="absolute p-2 transition-colors rounded-full -left-12 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-arrow-left">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
        </a>
    </div>
</x-app-layout>
