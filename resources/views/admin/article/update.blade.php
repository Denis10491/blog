@extends('layouts.admin')

@section('content')
    <form class="space-y-3 py-8" action="{{ route('admin.api.articles.update', ['article' => $article]) }}"
          method="POST"
          enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')

        <div class="mt-3 text-pink text-xxs xs:text-xs">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

        <div>
            <input type="file" class="hidden" id="image-input" name="cover">
            <div class="mt-2">
                <img
                    id="article-cover"
                    src="{{ $article->cover }}"
                    alt="" class="rounded-lg object-cover hover:cursor-pointer"
                    @click="loadImage"/>
            </div>
            <button class="w-full btn btn-purple mt-2" type="button" id="cover-but">Загрузить</button>
        </div>

        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('title') {{ $message }} @enderror</div>
        <input
            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
            type="text"
            autofocus=""
            autocomplete="title"
            placeholder="Заголовок"
            name="title"
            value="{{ $article->title }}"
        >

        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('body') {{ $message }} @enderror</div>
        <textarea
            class="w-full px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
            placeholder="Содержимое"
            name="body"
            rows="10"
        >{{ $article->body }}</textarea>

        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('source_url') {{ $message }} @enderror</div>
        <input
            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
            type="text"
            autofocus=""
            autocomplete="source_url"
            placeholder="Источник"
            name="source_url"
            value="{{ $article->source_url }}"
        >

        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('source_url') {{ $message }} @enderror</div>
        <input
            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
            type="text"
            autofocus=""
            autocomplete="author"
            placeholder="Автор"
            name="author"
            value="{{ $article->author }}"
        >

        <button class="w-full btn btn-pink" type="submit">Сохранить</button>
    </form>

    <script>
        const imageInput = document.getElementById('image-input');

        document.getElementById('cover-but').addEventListener('click', () => {
            imageInput.click();
        })

        imageInput.addEventListener('change', function (event) {
            let reader = new FileReader()

            reader.addEventListener('loadend', function (event) {
                document.getElementById('article-cover').src = event.target.result
            })

            reader.readAsDataURL(event.target.files[0]);
        })
    </script>
@endsection
