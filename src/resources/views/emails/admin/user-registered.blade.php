@extends('emails.layout')

@section('username', $user->username)
@section('email', $user->email)

@section('content')
<h1 style="padding-bottom: 24px; border-bottom: 1px solid #d4d4d4; font-size: 24px;">Hi Admin,</h1>
<p>A new user has registered.</p>
<p style="padding-bottom: 24px; border-bottom: 1px solid #d4d4d4;">
    <span><span>Username:</span> <strong>{{ $user->username }}</strong></span><br>
    <span><span>Email:</span> <strong>{{ $user->email }}</strong></span><br>
    <span><span>First name:</span> <strong>{{ $user->first_name }}</strong></span><br>
    <span><span>Last Name:</span> <strong>{{ $user->last_name }}</strong></span><br>
</p>
@endsection
