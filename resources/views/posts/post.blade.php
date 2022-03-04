@extends('layouts/template')
@section('title', $post->title)
@section('content')
    <main class="container p-4 mx-auto mt-8 flex flex-col">
        <h1 class="font-bold text-3xl mb-8"> {{ $post->title }} </h1>
        <p class="mb-8"><em>Publier par {{ $post->author->name }} le
                {{ \Carbon\Carbon::parse($post->created_at)->locale('fr_FR')->isoFormat('DD MMM YYYY, HH:mm') }}</em></p>
        <p>{{ $post->body }}</p>
        <hr class="my-8">

        <h2 class="text-2xl mt-4 mb-4">Commentaires :</h2>
        @if (Illuminate\Support\Facades\Auth::check())
            <form class="mb-8" action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="flex flex-col">
                    <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="text" name="name" id="name"
                        placeholder="Votre nom" required>
                    <textarea class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="text" name="body"
                        id="body" placeholder="Votre commentaire" required></textarea>
                </div>
                <input type="hidden" name="id_post" required value="{{ $post->id }}">
                <button type="submit"
                    class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-indigo-500">
                    Publier</button>
            </form>
        @endif
        <div class="space-y-4">
            @foreach ($post->comments as $comment)
                <div class="flex-1 border px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>{{ $comment->author->name }}</strong> <span class="text-xs text-gray-400">le
                        {{ \Carbon\Carbon::parse($comment->created_at)->locale('fr_FR')->isoFormat('DD MMM YYYY \à HH:mm') }}</span>
                    <p class="text-sm">{{ $comment->body }}</p>

                </div>
            @endforeach
        </div>
    </main>
@endsection
