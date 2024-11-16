<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserLoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user  =  User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'  => 'Login success',
            'status'   => 'success',
            'id'       => $user->id,
            'username' => $user->username,
            'token'    => $token,
        ]);
    }
}
