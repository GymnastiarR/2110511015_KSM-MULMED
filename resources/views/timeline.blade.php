<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timline') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4">
                <h1 class="text-xl font-bold text-black/80 mb-3">Post Terbaru</h1>
                @foreach ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-4 mt-2 drop-shadow-md">
                    <div class="mb-2">
                        <h2 class="text-xl text-black font-semibold inline">{{ $post->title }}</h2>
                        <span> - {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="mb-3">{{ $post->body }}</p>
                    <a href="/post/{{ $post->id }}" class="block text-sm italic">See Detail. . .</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
