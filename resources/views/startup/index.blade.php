@extends('layouts.app')

@section('content')
    <div class="mainstartup">
        <a class="mainstartuptitle" href="{{route('startup.create') }}"><b>Создай проект</b></a> <a class="mainstartuptitle" href="{{ route('profile.create') }}">или помогай им разиваться</a>
        <startup-list-component url="/api/startups/top"></startup-list-component>
    </div>
@endsection
