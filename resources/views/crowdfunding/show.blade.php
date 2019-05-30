@extends('layouts.app')

@section('content')
    <section class="postinfoimg" style="background: linear-gradient(360deg, rgba(0, 0, 0, 0.65) 0%, rgba(255, 255, 255, 0) 100%), url('/uploads/posts/{{ $post->image }}')">
        <div>
            <h1>{{ $post->title }}</h1>
            {{--<p>Lorem ipsum dolor sit amet</p>--}}
        </div>
    </section>
    <section>
        <div class="pastila">
            <p>{{ $post->body }}</p>
            {{--<img src="img/tablet.png" alt="">--}}
            {{--<p>Aliquet risus feugiat in ante metus dictum at. Leo duis ut diam quam nulla porttitor massa id neque. Varius duis at consectetur lorem donec massa sapien faucibus. Interdum varius sit amet mattis vulputate enim nulla aliquet porttitor. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. Risus quis varius quam quisque id diam vel quam elementum. Est placerat in egestas erat imperdiet. Pellentesque pulvinar pellentesque habitant morbi tristique. Ipsum dolor sit amet consectetur adipiscing. Nulla pharetra diam sit amet nisl suscipit adipiscing. Senectus et netus et malesuada fames. Id faucibus nisl tincidunt eget nullam. Ut lectus arcu bibendum at. Purus sit amet volutpat consequat mauris nunc congue nisi vitae.</p>--}}
            {{--<p>Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Turpis egestas sed tempus urna. Massa sed elementum tempus egestas sed. A erat nam at lectus urna duis. Orci sagittis eu volutpat odio facilisis mauris sit. Est placerat in egestas erat imperdiet. Sed risus pretium quam vulputate dignissim suspendisse in est ante. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. At tellus at urna condimentum mattis. Tincidunt id aliquet risus feugiat in. Enim sit amet venenatis urna cursus eget nunc scelerisque. At ultrices mi tempus imperdiet nulla malesuada pellentesque. Nec feugiat in fermentum posuere urna nec tincidunt. Interdum velit laoreet id donec ultrices. Elementum tempus egestas sed sed risus. Suspendisse in est ante in nibh. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa. Venenatis lectus magna fringilla urna porttitor rhoncus.</p>--}}
        </div>
    </section>
    <section class="formpost">
        <div class="othproj">
            <div class="search">
                <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                    @csrf
                    <input type="text" name="comment" placeholder="Enter your comment" id="">
                    <button>Post</button>
                </form>
                <div class="specdiv">
                    @foreach($comments as $comment)
                        <div class="specblock">
                            <div class="spectop">

                                <div class="namespan">
                                    <h3>{{ $comment->creator->name }}</h3>
                                </div>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
