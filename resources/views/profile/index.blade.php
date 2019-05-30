@extends('layouts.app')

@section('content')
    <div class="mainstartup">
        <h1 class="mainstartuptitle"><b>Отправляй приглашение</b> вместе меняйте мир</h1>
        <div class="mainstartuppost" >
            @foreach($profiles as $profile)
                <a class="onepost" href="{{ route('profile.showProfile', $profile->id) }}">
                    <img src="/uploads/profile/avatar/{{ $profile->avatar }}" alt="">
                    <div class="fr2" style="grid-template-columns: none;">
                        <div>
                            <h1>{{ '@'.$profile->nickname }}</h1>
                            <ul class="tags active">
                            @foreach($profile->skills as $skill)
                                <li>{{ $skill->name }}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
