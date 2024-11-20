<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;

class UserLoginController extends Controller
{
    public function __invoke(LoginRequest $request): UserResource
    {
        $request->authenticate();

        $user = Auth()->user();

        return new UserResource($user);
    }
}
