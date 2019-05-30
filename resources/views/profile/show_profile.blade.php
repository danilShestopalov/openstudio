@extends('layouts.app')

@section('content')
    <section class="prof" style="background: url('/uploads/profile/background/{{ $profile->background }}')">
        <img src="/uploads/profile/avatar/{{ $profile->avatar }}" alt="">
        <form class="profinfo" action="{{ route('profile.like', $profile->id) }}" method="post">
            @csrf
            <h1>{{ '@'.$profile->nickname }}</h1>
            <button>Отправить запрос</button>
        </form>
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
        <div class="block2">
            <ul>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>More</button>
                    </div>
                    <a href="2ch.hk" class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </a>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
                <li>
                    <img src="img/fuck.png" alt="">
                    <div class="div1">
                        <h1>Lorem, ipsum.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <button>Подробнее</button>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
