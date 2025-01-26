<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MemberProfileEmailVerificationRequest;
use App\Models\MemberProfile;
use Illuminate\Auth\Events\Verified;

class MemberProfileEmailVerificationController extends Controller
{
    public function __invoke(MemberProfileEmailVerificationRequest $request)
    {
        $id = $request->id;
        $user = MemberProfile::find($id);

        if (empty($user)) {
            return false;
        }
        if (! hash_equals(sha1($user->email), (string) $request->hash)) {
            return false;
        }
        $user->markEmailAsVerified();
        event(new Verified($user));

        return true;
    }
}
