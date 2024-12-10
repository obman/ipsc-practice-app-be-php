<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request): UserResource
    {
        // this needs to move in a DTO class
        $user = \App\Models\User::create([
            'email' => $request->email,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return new UserResource($user);
    }
}
