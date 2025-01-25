<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MemberProfileLoginRequest;
use App\Http\Resources\MemberProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberProfileLoginController extends Controller
{
    public function __invoke(MemberProfileLoginRequest $request): MemberProfileResource
    {
        $request->authenticate();
        $member = Auth::guard('api')->user();
        if ((bool) $request->remember_me !== (bool) $member->remember_me) {
            $member->remember_me = (bool) $request->remember_me;
            $member->update();
        }
        return new MemberProfileResource($member);
    }
}
