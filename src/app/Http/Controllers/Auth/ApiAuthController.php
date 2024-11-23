<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request): UserResource
    {
        $request->authenticate();
        return new UserResource(Auth()->user());
    }

    // need new request class
    // where would be logic for creating new user?
    public function register(RegisterUserRequest $request): UserResource
    {
        // this needs to move in a service class
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

    public function logout(Request $request): Response
    {
        //Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
