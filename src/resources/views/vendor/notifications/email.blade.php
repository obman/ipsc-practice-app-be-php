@extends('emails.layout')

@section('username', $user->username)
@section('email', $user->email)

@section('content')
<h1 style="margin-bottom: 32px; font-size: 24px;">Hi {{ $user->username }}</h1>
<p style="margin-bottom: 24px;">In order to complete registration please click the button below to verify your email address.</p>
<p style="padding-bottom: 24px; margin-bottom: 24px; border-bottom: 1px solid #d4d4d4"><a href="{{ $actionUrl }}" target="_blank" class="confirm-button">{{ $actionText }}</a></p>
<p>
    <span>If you're having trouble clicking the {{ $actionText }} button, copy and paste the URL below into your web browser:</span><br>
    <a href="" style="color: #46515a;" target="_blank">({{ $actionUrl }})</a>
</p>
@endsection
