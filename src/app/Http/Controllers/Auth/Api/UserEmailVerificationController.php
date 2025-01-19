<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserEmailVerificationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class UserEmailVerificationController extends Controller
{
    public function __invoke(UserEmailVerificationRequest $request)
    {
        $validated = $request->validated();
        $id = $validated['id'];
        $user = User::find($id);

        if (empty($user)) {
            return false;
        }
        if (! hash_equals(sha1($user->email), (string) $validated['hash'])) {
            return false;
        }
        $user->markEmailAsVerified();
        event(new Verified($user));

        return true;
    }
}
