@extends('layouts.app')

@section('content')
    <div class="mainstartup">
        <h1 class="mainstartuptitle"><b>Lorem ipsum dolor sit amet.</b> Lorem ipsum dolor sit amet.</h1>
        <div class="mainstartuppost">
            @foreach($startups as $startup)
                <div class="onepost">
                    <img src="/uploads/startup/logo/{{ $startup->logo }}" alt="">
                    <div class="fr2">
                        <div>
                            <h1>{{ $startup->title }}</h1>
                            <p>{{ $startup->tagline }}</p>
                        </div>
                        <div></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
