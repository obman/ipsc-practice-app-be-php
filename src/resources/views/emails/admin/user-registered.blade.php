@extends('emails.layout')

@section('username', $user->username)
@section('email', $user->email)

@section('content')
    <p>Hi Admin, a new user has registered.</p>
    <p>Username: {{ $user->username }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>First Name: {{ $user->first_name }}</p>
    <p>Last Name: {{ $user->last_name }}</p>
@endsection
