@extends('layouts.app')

@section('content')
<div class="authshow">
    <h1>Login</h1>
		{{--<img src="/assets/img/OS.png">--}}
    <p>To use the site functionals, you need to log in.</p>
    <a class="show-auth" href="{{ route('auth.provider', 'google') }}">
        <h1>Login with Google</h1>
    </a>
</div>
@endsection
