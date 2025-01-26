<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MemberProfileRegisterRequest;
use App\Http\Resources\MemberProfileResource;
use App\Models\MemberProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class MemberProfileRegisterController extends Controller
{
    public function __invoke(MemberProfileRegisterRequest $request): MemberProfileResource
    {
        // this needs to move in a DTO class
        $user = MemberProfile::create([
            'email' => $request->email,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return new MemberProfileResource($user);
    }
}
