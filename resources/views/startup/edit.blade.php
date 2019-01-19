@extends ('layouts.app')
{{--<nav class="navbar navbar-inverse">--}}
    {{--<div class="navbar-header">--}}
    {{--<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>--}}
    {{--</div>--}}
    {{--<ul class="nav navbar-nav">--}}
        {{--<li><a href="{{ URL::to('profile') }}">View All Nerds</a></li>--}}
        {{--<li><a href="{{ URL::to('profile/create') }}">Create a Nerd</a>--}}
    {{--</ul>--}}
{{--</nav>--}}

@section('content')
<form action="/profile/{{$startup->id}}" method="post">

    {{ csrf_field() }}
    {!! method_field('patch') !!}

    <div class="form-group">
        <label for="title">Firstname:</label>
        <input class="form-control" type="text" name="firstname" value="{{ $startup->title }}">
    </div>
    <div class="form-group">
        <label for="intro">Info:</label>
        <textarea class="form-control" type="text" name="info" >{{ $startup->info }}</textarea>
    </div>
    <div class="form-group">
        <label for="intro">Urls to projects:</label>
        <textarea class="form-control" type="text" name="urls" >{{ $startup->urls }}</textarea>
    </div>


    <div class="content">
        <div class="m-b-md">
            <h3 class="title"></h3>

            <div>
                <input type="file" name="startup_image" />
            </div>
            <br/>
            <div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>

        </div>
    </div>


    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>

</form>
@endsection
