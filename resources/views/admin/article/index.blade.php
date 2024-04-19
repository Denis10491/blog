@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-pink mt-12" href="{{ route('admin.articles.create') }}">Написать статью</a>
        <div class="tasks grid gap-4 grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-14 xl:gap-y-20 mt-4 md:mt-20">
            @foreach($articles as $article)
                <x-admin.minified-article :article="$article"></x-admin.minified-article>
            @endforeach
        </div>
    </div>
@endsection
