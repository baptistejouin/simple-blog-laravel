@extends('layouts/template')
@section('title', 'Créer du contenu')
@section('content')
    <main>
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Nouvel article</div>
        <form class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl"
            action="{{ route('posts.store') }}" method="POST">
            @csrf
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                placeholder="Le titre de votre article" type="text" name="title">
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false"
                placeholder="Décrivez le contenu de votre article ici" name="body"></textarea>
            <div class="buttons flex mt-4">
                <button
                    class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</button>
                <button type="submit"
                    class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                    Post</button>
            </div>
        </form>
    </main>
@endsection
