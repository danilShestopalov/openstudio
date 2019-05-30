@extends('layouts.app')

@section('content')
<section class="s1">
    <main-post-list-component></main-post-list-component>
        <div class="block2">
    <main-startup-list-component url="/api/startups/top"></main-startup-list-component>
        </div>
</section>
{{--<section class="s2">--}}
    {{--<div>--}}
        {{--<a style="align-self: center;" href="{{ route('startup.create') }}">--}}
            {{--<h1 style="font-size: 75px; align-self: center;">Create</h1>--}}
        {{--</a>--}}
        {{--<h2 style="font-size: 50px; align-self: center;">Create</h2>--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--<a style="align-self: center;" href="{{ route('profile.create') }}">--}}
            {{--<h1 style="font-size: 75px; align-self: center;">Develop</h1>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--<a style="align-self: center;" href="{{ route('post.index') }}">--}}
            {{--<h1 style="font-size: 75px; align-self: center;">Read</h1>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<div>--}}
{{--        <a style="align-self: center;" href="{{ route('crowdfunding.index') }}">--}}
            {{--<h1 style="font-size: 75px; align-self: center;">Start</h1>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--<h1 style="font-size: 100px; align-self: center;">?</h1>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<section class="s3">--}}
    {{--<div class="partic">--}}
        {{--<img src="img/phone.png" alt="">--}}
    {{--</div>--}}
    {{--<div class="sect3-div">--}}
        {{--<h1>OpenSTUDIO</h1>--}}
        {{--<div class="s3grid">--}}
            {{--<div>--}}
                {{--<h1>{{ $startups }}</h1>--}}
                {{--<h2>Project</h2>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<h1>{{ $profiles }}</h1>--}}
                {{--<h2>Worker</h2>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<h1>{{ $posts }}</h1>--}}
                {{--<h2>Posts</h2>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<p>OpenStudio - a platform connecting people united by one goal, regardless of their location or nationality, to implement the idea</p>--}}
        {{--<button>More Us</button>--}}
    {{--</div>--}}
{{--</section>--}}
@endsection
