<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Idea card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <script src="/js/proj.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="projectt">
<div id="app">
<section class="sect1">
    <div class="rightcol1">
        <div class="userinfo">
            <img class="ava" src="/assets/img/ava.png" alt="">
            <div class="nut">
                <h1>{{ $startup->title }}</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, similique!</p>
                <div class="hrefs">
                    <a href=""><img src="/assets/img/twi.png" alt=""></a>
                    <a href=""><img src="/assets/img/fb.png" alt=""></a>
                    <a href=""><img src="/assets/img/ig.png" alt=""></a>
                    <a href=""><img src="/assets/img/VK.png" alt=""></a>
                </div>
                <div class="buts">
                    <button>Show Website</button>
                    <button class="bluebut">Upvote 9999</button>
                </div>
            </div>
        </div>
        <p class="text1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget arcu dictum varius duis. Lectus urna duis convallis convallis tellus id. Venenatis urna cursus eget nunc. Enim neque volutpat ac tincidunt vitae semper quis. Quis imperdiet massa tincidunt nunc. Suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque. Feugiat nibh sed pulvinar proin gravida. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus.</p>
        <div class="recommend">
            <h2>Would you recommend Lorem ipsum to a friend?</h2>
            <div>
                <button>Like</button>
                <button>Neutral</button>
                <button>Negative</button>
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="/assets/img/bg.png" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="/assets/img/bg.png" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="/assets/img/bg.png" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="/assets/img/bg.png" style="width:100%">
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
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
                    <img class="like" src="/assets/img/like.png" alt="">
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
</div>
</body>
</html>
