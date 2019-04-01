@extends('layouts.app')

@section('content')
    <section class="prof">
        <img src="/uploads/profile/{{ $profile->avatar }}" alt="">
        <div class="profinfo">
            <h1>Richard Fiedler</h1>
            <p>@f13dler.art</p>
        </div>
    </section>
    <section class="under">
        <div class="sometext">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas integer eget aliquet nibh praesent tristique. Nec ullamcorper sit amet risus nullam eget felis eget. Et netus et malesuada fames ac turpis egestas.</p>
        </div>
        <div class="tagsdiv">
            <div class="tags">
                <h3>Professions:</h3>
                @foreach($profile->professions as $profession)
                    <button>{{ $profession->name }}</button>
                @endforeach
                <h3>Skills:</h3>
                @foreach($profile->skills as $skill)
                        <button>{{ $skill->name }}</button>
                    @endforeach
            </div>
        </div>
        <div class="block2">

        </div>
        <div class="block2">
            <main-startup-list-component></main-startup-list-component>
        </div>
    </section>
@endsection
