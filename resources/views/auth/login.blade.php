@extends('layouts.app')

@section('content')
    <form method="post" class="forms" action="{{ route('login') }}">
        @csrf
        {{--<h1>Lorem ipsum dolor sit amet.</h1>--}}
        <label for="login">Email</label>
        <input name="email" placeholder="" type="text">
        <label for="pass">Password</label>
        <input name="password" placeholder="" type="password">
        <div class="formbottom">
            @if ($errors)
                <span role="alert">
                <strong>{{ $errors->first() }}</strong>
            </span>
            @endif
            <button class="accept">Sign up</button>
        </div>
    </form>
@endsection
