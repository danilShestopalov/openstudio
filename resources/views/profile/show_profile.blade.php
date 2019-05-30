@extends('layouts.app')

@section('content')
    <section class="prof" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/uploads/profile/background/{{ $profile->background }}')">
        <img src="/uploads/profile/avatar/{{ $profile->avatar }}" alt="">

            <h1>{{ '@'.$profile->nickname }}</h1>

    </section>
    <section class="under">
        <div class="sometext">
            <h1>About me</h1>
            <p>{{ $profile->about }}</p>
        </div>
        <div class="tagsdiv">
            <h1>Skills</h1>
            <div>
                @foreach($profile->skills as $skills)
                    <button>{{ $skills->name }}</button>
                @endforeach
            </div>
        </div>
        @if(!empty($startups))
        <div class="block2">
            <ul>
                @foreach($startups as $startup)
                <li>
                    <img src="/uploads/startup/logo/{{ $startup->logo }}" width="100px" height="100px" alt="">
                    <div class="div1">
                        <h1>{{ $startup->title }}</h1>
                        <p>{{ $startup->tagline }}</p>
                    </div>
                    <form class="sendoffer" action="{{ route('profile.like', $profile->id) }}" method="post">
                        @csrf
                        <input hidden name="startup_id" value="{{ $startup->id }}">
                        <button>Отправить предложение</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
        @else
            <h2>Создайте стартап</h2>
        @endif
    </section>
@endsection
