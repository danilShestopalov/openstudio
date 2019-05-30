@extends('layouts.app')

@section('content')
    <div class="mainstartup">
        <h1 class="mainstartuptitle"><b>Lorem ipsum dolor sit amet.</b> Lorem ipsum dolor sit amet.</h1>
        <div class="mainstartuppost">
            @foreach($posts as $post)
                <a class="onepost postindex" href="{{ route('post.show', $post->id) }}" style="background: linear-gradient(360deg, rgba(0, 0, 0, 0.65) 0%, rgba(255, 255, 255, 0) 100%), url('/uploads/posts/{{ $post->image }}') ">
                    {{--<img src="/uploads/profile/{{ $post->image }}" alt="">--}}
                    <div class="fr2" style="grid-template-columns: none;">
                            <h1>{{ $post->title }}</h1>
                            {{--<p>{{ $post->tagline }}</p>--}}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
