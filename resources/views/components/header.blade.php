<header class="header pt-6 xl:pt-12">
    <div class="container">
        <div class="header-inner flex items-center justify-between lg:justify-start">
            <div class="header-logo shrink-0">
                <a href="index.html" rel="home">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ asset('assets/images/nav/logo.svg') }}"
                    >
                </a>
            </div><!-- /.header-logo -->

            <div class="header-menu grow hidden lg:flex items-center ml-8 mr-8 gap-8">
                <nav class="2xl:flex gap-8">
                    <a href="articles.html"
                       class="ml-4 mr-4 text-white hover:text-pink"
                    >
                        Статьи
                    </a>
                </nav>
            </div><!-- /.header-menu -->

            <div class="header-actions flex items-center gap-3 md:gap-5 z-[9999]">
                <a href="login.html" class="profile hidden xs:flex items-center">
                    <svg aria-hidden="true" class="profile-icon w-8 h-8 text-purple"
                         height="1em" preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 32 32" width="1em"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs/>
                        <path
                            d="M26.749 24.93A13.99 13.99 0 1 0 2 16a13.899 13.899 0 0 0 3.251 8.93l-.02.017c.07.084.15.156.222.239c.09.103.187.2.28.3c.28.304.568.596.87.87c.092.084.187.162.28.242c.32.276.649.538.99.782c.044.03.084.069.128.1v-.012a13.901 13.901 0 0 0 16 0v.012c.044-.031.083-.07.128-.1c.34-.245.67-.506.99-.782c.093-.08.188-.159.28-.242c.302-.275.59-.566.87-.87c.093-.1.189-.197.28-.3c.071-.083.152-.155.222-.24zM16 8a4.5 4.5 0 1 1-4.5 4.5A4.5 4.5 0 0 1 16 8zM8.007 24.93A4.996 4.996 0 0 1 13 20h6a4.996 4.996 0 0 1 4.993 4.93a11.94 11.94 0 0 1-15.986 0z"
                            fill="currentColor"/>
                    </svg>
                    <span class="profile-text relative ml-2 text-white text-xxs md:text-xs font-bold">Войти</span>
                </a>
            </div><!-- /.header-actions -->
        </div><!-- /.header-inner -->
    </div><!-- /.container -->
</header>
