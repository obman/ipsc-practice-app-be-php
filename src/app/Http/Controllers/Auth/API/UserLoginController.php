<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class UserLoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user  =  Auth()->user();
        $response = [
            'message'  => 'Login success',
            'status'   => 'success',
            'id'       => $user->id,
            'username' => $user->username,
        ];
        $tokenName = "user_auth_token_$user->email";
        $cachedToken = Cache::get($tokenName);
        if (Cache::has($tokenName)) {
            $response['token'] = $cachedToken;
            return response()->json($response);
        }

        $tokenObject = $user->tokens()->where('name', $tokenName)->first();
        $token = !is_null($tokenObject) ? $tokenObject->token : null;
        if (!$token) {
            $token = $user->createToken($tokenName)->plainTextToken;
        }

        Cache::put($tokenName, $token);
        $response['token'] = $token;
        return response()->json($response);
    }
}
