@extends('layouts.app')

@section('content')
    <section class="blog">
        <div class="bloginfo">
            <h1 class="blueh1">BLOG</h1>
            <button>Publish</button>
        <div class="mainpost">
            <h1>{{ $posts[0]->title }}</h1>
            <p>{{ $posts[0]->tagline }}</p>
        </div>
        <div class="three">
            <div>
                <h1>{{ $posts[1]->title }}</h1>
                <p>{{ $posts[1]->tagline }}</p>
            </div>
            <div>
                <h1>{{ $posts[2]->title }}</h1>
                <p>{{ $posts[2]->tagline }}</p>
            </div>
            <div>
                <h1>{{ $posts[3]->title }}</h1>
                <p>{{ $posts[3]->tagline }}</p>
            </div>
        </div>
        <div class="two">
            <div>
                <h1>{{ $posts[4]->title }}</h1>
                <p>{{ $posts[4]->tagline }}</p>
            </div>
            <div>
                <h1>{{ $posts[5]->title }}</h1>
                <p>{{ $posts[5]->tagline }}</p>
            </div>
        </div>
        <button class="moreposts">More</button>
    </section>
@endsection
