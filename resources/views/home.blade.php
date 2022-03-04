@extends('layouts/template')
@section('title', 'Les posts les plus récents')
@section('content')
    <main class="container p-4 mx-auto mt-8 flex flex-col">
        <h1 class="font-bold text-3xl mb-8 text-center">Les posts les plus récents</h1>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <article class="flex flex-col text-gray-800 border border-gray-300 shadow-lg max-w-2xl text-center">
                    @if ($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->alt || 'an image without alt' }}"
                            class="w-full" />
                    @else
                        <img src="https://placeholder.pics/svg/300x200/DEDEDE/555555/image%20non%20disponible"
                            alt="placeholder image" class="w-full" />
                    @endif
                    <div class="p-4">
                        <h2 class="font-semibold text-lg">{{ $post->title }}</h2>
                        <p class="my-2">
                            {{ Illuminate\Support\Str::limit($post->body, 50) }}
                        </p>
                        <em class="text-sm">Publier par {{ $post->author->name }} le
                            {{ \Carbon\Carbon::parse($post->created_at)->locale('fr_FR')->isoFormat('DD MMM YYYY, HH:mm') }}</em>
                        <div class="buttons flex mt-4 justify-center">
                            <a href="/posts/{{ $post->slug }}"
                                class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500">Lire
                                la suite</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-8">
            {!! $posts->links() !!}
        </div>
    </main>
@endsection
