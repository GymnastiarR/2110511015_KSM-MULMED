<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-5 px-6 drop-shadow-md">
                <h1 class="text-xl font-bold text-black/80 mb-3">Buat Post Baru</h1>
                <form action="/post" method="post" class="flex flex-col">
                    @csrf
                    <input type="text" placeholder="Judul Postingan" class="w-full rounded-lg mb-4" name="title">
                    <textarea id="" cols="30" rows="10" placeholder="Tulis postingan disini" class="rounded-lg mb-4" name="body"></textarea>
                    <div>
                        <button class="w-24 py-3 rounded-lg bg-gray-500 text-white">POST</button>
                    </div>
                </form>
            </div>
            <div class="mt-4">
                <h1 class="text-xl font-bold text-black/80">My POST</h1>
                @foreach ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-4 mt-2 drop-shadow-md">
                    <div class="mb-2">
                        <h2 class="text-xl text-black font-semibold inline">{{ $post->title }}</h2>
                        <span> - {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <p>{{ $post->body }}</p>
                </div>
                @foreach ($post->comments as $comment)                    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-4 mt-2 drop-shadow-md ml-3">
                        <div class="mb-2">
                            <h2 class="text-xl text-black font-semibold inline">{{ $comment->user->name }}</h2>
                            <span> - {{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p>{{ $comment->body }}</p>
                    </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
