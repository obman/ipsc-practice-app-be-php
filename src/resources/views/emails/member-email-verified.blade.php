@extends('emails.layout')

@section('username', $user->username)
@section('email', $user->email)

@section('content')
<h1 style="margin-bottom: 32px; font-size: 24px;">Hi {{ $user->username}}</h1>
<p style="margin-bottom: 12px;">You confirmed email and your registration process is now complete. You can use your account.</p>
<p>Best,</p>
@endsection
