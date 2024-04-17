<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Http\Requests\User\UpdateProfileUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function updateProfile(User $user, UpdateProfileUserRequest $request): RedirectResponse
    {
        $request->validated();

        $data = [];

        if (isset($request->avatar)) {
            $path = $request->file('avatar')->storePublicly('avatars', 'public');
            Storage::disk('public')->url($path);
            $data['avatar_url'] = env('APP_URL').'/storage/'.$path;
        }

        if (isset($request->name)) {
            $data['name'] = $request->name;
        }

        if (isset($request->email)) {
            $data['email'] = $request->email;
        }

        $user->update($data);


        return redirect()->back()->with([
            'status' => true,
            'profile' => 'Профиль сохранен'
        ]);
    }

    public function updatePassword(User $user, UpdatePasswordUserRequest $request): RedirectResponse
    {
        $request->validated();

        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        return redirect()->back()->with([
            'status' => true,
            'password' => 'Новый пароль установлен'
        ]);
    }
}
