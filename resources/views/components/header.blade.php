<header class="header pt-6 xl:pt-12">
    <div class="container">
        <div class="header-inner flex items-center justify-between lg:justify-start">
            <div class="header-logo shrink-0">
                <a href="{{ route('home') }}" rel="home">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ asset('assets/images/nav/logo.svg') }}"
                    >
                </a>
            </div><!-- /.header-logo -->

            <div class="header-menu grow hidden lg:flex items-center ml-8 mr-8 gap-8">
                <nav class="2xl:flex gap-8">
                    <a href="{{ route('articles.index') }}"
                       class="ml-4 mr-4 text-white hover:text-pink"
                    >
                        Статьи
                    </a>
                </nav>
            </div><!-- /.header-menu -->

            @guest
                <div class="header-actions flex items-center gap-3 md:gap-5 z-[9999]">
                    <a href="{{ route('login') }}" class="profile hidden xs:flex items-center">
                        <svg aria-hidden="true" class="profile-icon w-8 h-8 text-purple"
                             height="1em" preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 32 32" width="1em"
                             xmlns="http://www.w3.org/2000/svg">
                            <defs/>
                            <path
                                d="M26.749 24.93A13.99 13.99 0 1 0 2 16a13.899 13.899 0 0 0 3.251 8.93l-.02.017c.07.084.15.156.222.239c.09.103.187.2.28.3c.28.304.568.596.87.87c.092.084.187.162.28.242c.32.276.649.538.99.782c.044.03.084.069.128.1v-.012a13.901 13.901 0 0 0 16 0v.012c.044-.031.083-.07.128-.1c.34-.245.67-.506.99-.782c.093-.08.188-.159.28-.242c.302-.275.59-.566.87-.87c.093-.1.189-.197.28-.3c.071-.083.152-.155.222-.24zM16 8a4.5 4.5 0 1 1-4.5 4.5A4.5 4.5 0 0 1 16 8zM8.007 24.93A4.996 4.996 0 0 1 13 20h6a4.996 4.996 0 0 1 4.993 4.93a11.94 11.94 0 0 1-15.986 0z"
                                fill="currentColor"/>
                        </svg>
                        <span class="profile-text relative ml-2 text-white text-xxs md:text-xs font-bold">Войти</span>
                    </a>
                </div><!-- /.header-actions -->
            @endguest


            @auth
                <div class="header-actions flex items-center gap-3 md:gap-5 z-[9999]">
                    <div class="profile relative" x-data="{show: false}">
                        <button
                            @click="show=!show"
                            class="hidden xs:flex items-center text-white hover:text-pink transition"
                        >
                            <span class="sr-only">Профиль</span>

                            <img alt="Username"
                                 class="shrink-0 w-10 h-10 rounded-full"
                                 src="{{ auth()->user()?->avatar_url }}"
                            >

                            <svg class="shrink-0 w-4 h-4 ml-3" fill="currentColor" viewBox="0 0 30 16"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M27.536.72a2 2 0 0 1-.256 2.816l-12 10a2 2 0 0 1-2.56 0l-12-10A2 2 0 1 1 3.28.464L14 9.397 24.72.464a2 2 0 0 1 2.816.256Z"
                                      fill-rule="evenodd"/>
                            </svg>
                        </button>

                        <div
                            x-show="show"
                            class="absolute z-50 top-0 right-0 w-[280px] sm:w-[300px] mt-14 p-4 rounded-lg shadow-xl bg-card"
                        >
                            <h5 class="text-body text-xs">Мой профиль</h5>

                            <div class="mt-3">
                                <a href="{{ route('profile.index') }}" class="flex items-center">
                                    <img alt="Username"
                                         class="w-11 h-11 rounded-full"
                                         src="{{ auth()->user()?->avatar_url }}"
                                    >
                                    <span class="ml-3 text-xs md:text-sm font-bold text-white">
                                        {{ auth()->user()?->name }}
                                    </span>
                                </a>
                            </div>

                            <div class="mt-5">
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
                    </div>
                </div><!-- /.header-actions -->
            @endauth
        </div><!-- /.header-inner -->
    </div><!-- /.container -->
</header>
