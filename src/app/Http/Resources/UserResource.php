<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'id'       => $this->id,
            'email'    => $this->email,
            'username' => $this->username,
        ];
        $token = $this->getToken();
        if ($token) {
            $response['token'] = $token;
        }

        return $response;
    }

    private function getToken(): string {
        $tokenName = "user_auth_token_$this->email";
        $token = Cache::has($tokenName) ? Cache::get($tokenName) : null;

        if (!is_null($token)) {
            return $token;
        }

        $tokenObject = $this->tokens()->where('name', $tokenName)->first();
        $token = !is_null($tokenObject) ? $tokenObject->token : null;
        if (!$token) {
            $token = $this->createToken($tokenName)->plainTextToken;
        }

        Cache::put($tokenName, $token);
        return $token;
    }
}
