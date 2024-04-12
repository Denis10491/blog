@extends('layouts.main')

@section('content')
    <main class="py-16 lg:py-20">
        <div class="container">
            <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                Статьи
            </h1>

            <div>
                <div class="flex flex-wrap gap-3 mt-7">
                    <a href="#"
                       class="bg-pink grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                        Категория 1
                    </a>

                    @foreach($categories as $category)
                        <a href="#"
                           class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="tasks grid gap-4 grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-14 xl:gap-y-20 mt-12 md:mt-20">

                @foreach($articles as $article)
                    <x-minified-article :article="$article"></x-minified-article>
                @endforeach

            </div>

            <nav class="mt-4">
                <ul class="flex flex-wrap items-center justify-center gap-3">

                    @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $num => $page)
                        <li class="{{ $articles->currentPage() == $num ? 'active' : '' }}">
                            <a href="{{ $page }}"
                               class="block p-3 text-sm font-black leading-none {{ $articles->currentPage() == $num ? 'text-pink' : 'text-white hover:text-pink' }}"
                            >
                                {{ $num }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </nav>

        </div>
    </main>
@endsection
