<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request): UserResource
    {
        $request->authenticate();
        return new UserResource(Auth()->user());
    }

    // need new request class
    // where would be logic for creating new user?
    public function register()
    {}

    public function logout(Request $request): Response
    {
        //Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
