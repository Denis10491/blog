@extends('layouts.main')

@section('content')
    <main class="py-16 lg:py-20">
        <div class="container">
            @if (session('status'))
                <p class="max-w-[640px] mt-4 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple mb-5">
                    Изменения сохранены
                </p>
            @endif

            <div class="md:flex md:items-start md:justify-between md:space-x-4" x-data="{active: 1}">
                <div class="md:w-1/2 md:my-0 my-4 w-full p-2 xs:p-4 md:p-8 2xl:p-12 rounded-[20px] bg-purple">
                    <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 1}" @click="active = 1">
                        Редактировать профиль
                    </div>
                    <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 2}" @click="active = 2">
                        Изменить пароль
                    </div>
                </div>
                <div class="w-full p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
                    <form class="space-y-3" x-show="active === 1"
                          action="{{ route('api.user.update.profile', ['user' => $user]) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex items-center justify-between">
                            <div>
                                <input type="file" class="hidden" id="image-input" name="avatar">
                                <div class="mt-2">
                                    <img
                                        id="avatar-img"
                                        src="{{ $user->avatar_url }}"
                                        alt="" class="rounded-full h-20 w-20 object-cover"/>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="w-full btn btn-pink mt-2 mr-2" type="button" @click="loadImage">
                                    Загрузить
                                </button>
                                <button class="w-full btn btn-outline mt-2" type="button"> Удалить</button>
                            </div>
                        </div>

                        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('name') {{ $message }} @enderror</div>
                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="text"
                            placeholder="Имя"
                            name="name"
                        >

                        <div class="mt-3 text-pink text-xxs xs:text-xs">@error('email') {{ $message }} @enderror</div>
                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="email"
                            placeholder="E-mail"
                            name="email"
                        >

                        <button class="w-full btn btn-pink" type="submit"> Сохранить</button>

                        @if (session('profile'))
                            <div>
                                <div
                                    class="text-center p-4 my-4 rounded-lg shadow-xl bg-card">{{ session('profile') }}</div>
                            </div>
                        @endif
                    </form>

                    <form class="space-y-3" x-show="active === 2"
                          action="{{ route('api.user.update.password', ['user' => $user]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div
                            class="mt-3 text-pink text-xxs xs:text-xs">@error('current_password') {{ $message }} @enderror</div>
                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="password"
                            required=""
                            autocomplete="current-password"
                            placeholder="Текущий пароль"
                            name="current_password"
                        >

                        <div
                            class="mt-3 text-pink text-xxs xs:text-xs">@error('password') {{ $message }} @enderror</div>
                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="password"
                            required=""
                            autocomplete="new-password"
                            placeholder="Новый пароль"
                            name="password"
                        >

                        <div
                            class="mt-3 text-pink text-xxs xs:text-xs">@error('password_confirmation') {{ $message }} @enderror</div>
                        <input
                            class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                            type="password"
                            required=""
                            autocomplete="new-password"
                            placeholder="Повторите пароль"
                            name="password_confirmation"
                        >

                        <button class="w-full btn btn-pink" type="submit"> Сменить пароль</button>

                        @if (session('password'))
                            <div>
                                <div
                                    class="text-center p-4 my-4 rounded-lg shadow-xl bg-card">{{ session('password') }}</div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        const imageInput = document.getElementById('image-input');

        function loadImage() {
            imageInput.click();
        }

        imageInput.addEventListener('change', function (event) {
            let reader = new FileReader()

            reader.addEventListener('loadend', function (event) {
                console.log(reader)
                document.getElementById('avatar-img').src = event.target.result
            })

            reader.readAsDataURL(event.target.files[0]);
        })
    </script>
@endsection
