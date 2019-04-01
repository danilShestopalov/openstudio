@extends('layouts.app')

@section('content')
    <section class="postinfoimg" style="background: url('/uploads/posts/{{ $post->image }}')">
        <div>
            <h1>{{ $post->title }}</h1>
            @foreach($post->tags as $tag)
                <p>{{ $tag->tag }}</p>
            @endforeach
        </div>
    </section>
    <section>
        <div class="pastila">
            <p>{{ $post->body }}</p>
        </div>
    </section>
    <section class="formpost">
        @if(!\Illuminate\Support\Facades\Auth::check())
        <form class="subscr">
            <h1>Join us</h1>
            <button>Sign up</button>
        </form>
        @endif
        <div class="search">
            @if(\Illuminate\Support\Facades\Auth::check())
            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                @csrf
                <img class="fullq" src="/img/qatariq.png" alt="">
                <input type="text" name="comment">
                <button>Post</button>
            </form>
            @endif
            <div class="specdiv">
                @foreach($comments as $comment)
                    <div class="specblock">
                        <div class="spectop">
                            <img src="/img/qatariq.png" alt="">
                            <div class="namespan">
                                <h3>{{ $comment->creator->name }}</h3>
                                {{--<h5>@user_name | UI/UX Deisgner</h5>--}}
                            </div>
                        </div>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
            <button class="morecomm">More comments</button>
        </div>
    </section>
@endsection
