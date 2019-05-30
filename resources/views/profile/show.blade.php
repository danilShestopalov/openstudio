@extends('layouts.app')

@section('content')
    <section class="prof" style="background: url('/uploads/profile/background/{{ $profile->background }}')">
        <img src="/uploads/profile/avatar/{{ $profile->avatar }}" alt="">
        <div class="profinfo">
            <h1>{{ '@'.$profile->nickname }}</h1>
        </div>
    </section>
    <section class="under">
        <div class="sometext">
            <h1>About me</h1>
            <p>{{ $profile->about }}</p>
        </div>
        <div class="tagsdiv">
            {{--<h1>Professions</h1>--}}
            {{--<div>--}}
            {{--@foreach($profile->professions as $profession)--}}
                {{--<button>{{ $profession->name }}</button>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            <h1>Skills</h1>
            <div>
                @foreach($profile->skills as $skills)
                    <button>{{ $skills->name }}</button>
                @endforeach
            </div>
        </div>
    </section>
    {{--<section class="prof" style="background: url('/uploads/profile/avatar/{{ $profile->background }}')">--}}
        {{--<img src="/uploads/profile/avatar/{{ $profile->avatar }}" alt="">--}}
        {{--<div class="profinfo">--}}
            {{--<h1>{{ $profile->nickname }}</h1>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<section class="under">--}}
        {{--<div class="sometext">--}}
            {{--<p>{{ $profile->about }}</p>--}}
        {{--</div>--}}
        {{--<div class="tagsdiv">--}}
                {{--<h1>Professions:</h1>--}}
            {{--<div class="tags">--}}
                {{--@foreach($profile->professions as $profession)--}}
                    {{--<button>{{ $profession->name }}</button>--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--<h1>Skills:</h1>--}}
            {{--<div class="tags">--}}
                {{--@foreach($profile->skills as $skill)--}}
                    {{--<button>{{ $skill->name }}</button>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="block2">--}}
            {{--<startup-list-component url="/api/startups/favorite"></startup-list-component>--}}
        {{--</div>--}}
        {{--<div class="block2">--}}
            {{--<startup-list-component url="/api/startups/top"></startup-list-component>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection
