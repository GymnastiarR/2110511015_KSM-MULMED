<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-5 px-6 drop-shadow-md">
                <div class="mb-3">
                    <h1 class="inline text-xl font-semibold">{{ $post->title }}</h1>
                    <span> - {{ $post->created_at->diffForHumans() }}</span>
                </div>
                <p>{{ $post->body }}</p>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-5 px-6 drop-shadow-md mt-4">
                <form action="/comment" method="POST" class="flex flex-col">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <textarea name="body" id="" cols="30" rows="4"></textarea>
                    <div class="mt-4">
                        <button class="bg-slate-400 text-white py-2 px-4 rounded-md">Post Comment</button>
                    </div>
                </form>
            </div>
            <div class="mt-5">
                <h2 class="font-bold text-xl">Komentar Lainnya</h2>
                @foreach ($post->comments as $comment)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-5 px-6 drop-shadow-md mt-4">
                    <h1>{{ $comment->user->name }}</h1>
                    <p>{{ $comment->body }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
