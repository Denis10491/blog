<header class="header p-3 xl:pt-12 bg-card h-dvh fixed w-72">
    <div class="container">
        <div class="header-inner lg:justify-start">
            <div class="header-logo shrink-0">
                <a href="{{ route('home') }}" rel="home">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ asset('assets/images/nav/logo.svg') }}"
                    >
                </a>
            </div><!-- /.header-logo -->

            <div class="mt-5 header-menu grow hidden lg:flex items-center gap-8">
                <nav class="2xl:flex gap-8">
                    <a href="{{ route('admin.articles.index') }}"
                       class="text-white hover:text-pink"
                    >
                        Статьи
                    </a>
                </nav>
            </div><!-- /.header-menu -->

            <div class="header-actions flex items-center gap-3 md:gap-5 z-[9999]">
                <div class="mt-5 flex items-center justify-between w-full">
                    <span class="h-full">{{ auth()->user()?->email }}</span>
                    <div class="ml-3">
                        <form action="{{ route('api.logout') }}" method="POST">
                            @csrf

                            <button class="inline-flex items-center text-body hover:text-pink">
                                <svg class="shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m19.026 7.643-3.233-3.232a.833.833 0 0 0-1.178 1.178l3.232 3.233c.097.098.18.207.25.325-.012 0-.022-.007-.035-.007l-13.07.027a.833.833 0 1 0 0 1.666l13.066-.026c.023 0 .042-.012.064-.014a1.621 1.621 0 0 1-.278.385l-3.232 3.233a.833.833 0 1 0 1.178 1.178l3.233-3.232a3.333 3.333 0 0 0 0-4.714h.003Z"/>
                                    <path
                                        d="M5.835 18.333H4.17a2.5 2.5 0 0 1-2.5-2.5V4.167a2.5 2.5 0 0 1 2.5-2.5h1.666a.833.833 0 1 0 0-1.667H4.17A4.172 4.172 0 0 0 .002 4.167v11.666A4.172 4.172 0 0 0 4.169 20h1.666a.833.833 0 1 0 0-1.667Z"/>
                                </svg>
                                <span class="ml-2 font-medium">Выйти</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div><!-- /.header-actions -->
        </div><!-- /.header-inner -->
    </div><!-- /.container -->
</header>
