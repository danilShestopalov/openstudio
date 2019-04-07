@extends('layouts.app')

@section('content')
    <div class="projectt">
        <section class="sect1">
            <div class="rightcol1">
                <div class="userinfo">
                    <img class="ava" src="img/ava.png" alt="">
                    <div class="nut">
                        <h1>Lorem, ips</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, similique!</p>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="img/poly.png" alt="">
                    </div>
                </div>
                <h1>About project</h1>
                <p class="text1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget arcu dictum varius duis. Lectus urna duis convallis convallis tellus id. Venenatis urna cursus eget nunc. Enim neque volutpat ac tincidunt vitae semper quis. Quis imperdiet massa tincidunt nunc. Suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque. Feugiat nibh sed pulvinar proin gravida. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores est optio dolores ratione obcaecati id atque, incidunt repellat ex fugiat omnis modi aspernatur nesciunt maxime voluptate aut!</p>
                <button style="width: 25%; align-self: end">Show website</button>
            </div>
            <div class="slider">

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
