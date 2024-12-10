<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function __invoke(LoginRequest $request): UserResource
    {
        $request->authenticate();
        return new UserResource(Auth()->user());
    }
}
