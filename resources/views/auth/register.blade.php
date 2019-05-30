@extends('layouts.app')

@section('content')
    <form method="post" class="forms" action="{{ route('register') }}">
        @if ($errors)
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </span>
        @endif
        @csrf
        <h1>Join us</h1>
        <label for="login">Nickname</label>
        <input name="name" placeholder="" value="{{ old('name') }}" type="text">
        <label for="email">Email</label>
        <input name="email" placeholder="" type="text" value="{{ old('email') }}" required>
        <label for="password">Password</label>
        <input name="password" placeholder="" type="password" required>
        <label for="password">Repeat password</label>
        <input name="password_confirmation" placeholder="" type="password" required>
        <div class="formbottom">
            @if ($errors)
                <span role="alert">
                <strong>{{ $errors->first() }}</strong>
            </span>
            @endif
                <a href="{{ route('auth.provider', 'google') }}">google</a>
            <button class="accept">Sign up</button>
        </div>
    </form>
@endsection
