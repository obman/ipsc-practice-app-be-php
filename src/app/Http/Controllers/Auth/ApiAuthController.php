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

        $user = Auth()->user();

        return new UserResource(Auth()->user());
    }

    public function logout(Request $request): Response
    {
        //Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
