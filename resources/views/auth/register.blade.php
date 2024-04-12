@extends('layouts.auth')

@section('content')
    <main class="bg-darkblue text-white md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
        <div class="container">
            <div class="text-center">
                <a rel="home" href="{{ route('home') }}">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ asset('assets/images/nav/logo.svg') }}"
                    >
                </a>
            </div>
            <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                <h1 class="mb-5 text-lg font-semibold">Регистрация</h1>
                <form class="space-y-3" action="{{ route('api.register') }}" method="POST">
                    @csrf

                    @error('email') {{ $message }} @enderror
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        type="email"
                        required=""
                        autofocus=""
                        autocomplete="email"
                        placeholder="E-mail"
                        name="email"
                    >

                    @error('password') {{ $message }} @enderror
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        type="text"
                        required=""
                        placeholder="Имя"
                        name="name"
                    >

                    @error('password_confirmation') {{ $message }} @enderror
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        type="password"
                        required=""
                        autocomplete="current-password"
                        placeholder="Пароль"
                        name="password"
                    >

                    @error('password_confirmation') {{ $message }} @enderror
                    <input
                        class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                        type="password"
                        required=""
                        autocomplete="new-password"
                        placeholder="Повторите пароль"
                        name="password_confirmation"
                    >

                    <button class="w-full btn btn-pink" type="submit">Зарегистрироваться</button>
                </form>

                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        Есть аккаунт? <a class="text-white hover:text-white/70 font-bold underline underline-offset-4"
                                         href="{{ route('login') }}">Войти</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
