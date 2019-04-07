@extends('layouts.app')

@section('content')
    <div class="projectt">
        <section class="sect1">
            <div class="rightcol1">
                <div class="userinfo">
                    <img class="ava" src="/assets/img/ava.png" alt="">
                    <div class="nut">
                        <h1>Lorem, ips</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, similique!</p>
                    </div>
                    <div class="div2">
                        <span>55</span>
                        <img src="/assets/img/poly.png" alt="">
                    </div>
                </div>
                <h1>About project</h1>
                <p class="text1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget arcu dictum varius duis. Lectus urna duis convallis convallis tellus id. Venenatis urna cursus eget nunc. Enim neque volutpat ac tincidunt vitae semper quis. Quis imperdiet massa tincidunt nunc. Suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque. Feugiat nibh sed pulvinar proin gravida. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores est optio dolores ratione obcaecati id atque, incidunt repellat ex fugiat omnis modi aspernatur nesciunt maxime voluptate aut!</p>
                <button style="width: 25%; align-self: end">Show website</button>
            </div>
            <div class="slider">

            </div>
        </section>
<section class="sect2">
    <div class="search">
        <form action="{{ route('startup.comment.store', $startup->id) }}" method="post">
            @csrf
            <img src="/assets/img/qatariq.png" alt="">
            <input type="text" name="body" placeholder="Enter your comment" id="">
            <button>Post</button>
        </form>
        <div class="specdiv">
        @foreach($comments as $comment)
            <div class="specblock">
                <div class="spectop">
                    <img src="/assets/img/qatariq.png" alt="">
                    <div class="namespan">
                        <h3>Name</h3>
                        <h5>@user_name | UI/UX Deisgner</h5>
                    </div>
                    {{--<img class="like" src="/assets/img/like.png" alt="">--}}
                </div>
                <p>{{ $comment->body }}</p>
            </div>
        @endforeach
        </div>
    </div>
    <div class="othproj">
        <h2>Others project</h2>
            <main-startup-list-component></main-startup-list-component>
        <button class="moreproj">More project</button>
    </div>
</section>
@endsection
