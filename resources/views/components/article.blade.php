<main class="py-16 lg:py-20">
    <div class="container">
        <img class="w-full rounded-xl my-8" src="{{ $article->cover }}" alt="">

        <div class="prose prose-lg min-w-full prose-img:rounded-xl prose-invert">
            <h1 class="text-[26px] sm:text-xl xl:text-[48px] 2xl:text-2xl font-black">
                {{ $article->title }}
            </h1>
            <div class="flex flex-wrap gap-3 mt-7">
                @foreach($article->categories as $category)
                    <a href="#"
                       class="grow xs:grow-0 py-2 px-4 rounded-[32px] bg-[#2A2B4E] text-white no-underline text-xxs sm:text-xs font-semibold whitespace-nowrap">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="mt-4 break-words">
                {{ $article->body }}
            </div>
        </div>
    </div>
</main>
