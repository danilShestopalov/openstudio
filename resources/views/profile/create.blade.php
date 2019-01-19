{{--<html>--}}
{{--<head>--}}

    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
@extends('layouts.app')

@section('content')
    <div class="container">
{{--<body>--}}
    {{--<nav class="navbar navbar-inverse">--}}
        {{--<div class="navbar-header">--}}
            {{--<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>--}}
        {{--</div>--}}
        {{--<ul class="nav navbar-nav">--}}
            {{--<li><a href="{{ URL::to('profile') }}">View All Nerds</a></li>--}}
            {{--<li><a href="{{ URL::to('profile/create') }}">Create a Nerd</a>--}}
        {{--</ul>--}}
    {{--</nav>--}}
    {{--@if (count($errors) > 0)--}}
        {{--<div class = "alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}

    <form action="/profile" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Firstname:</label>
            <input class="form-control" type="text" name="firstname">
        </div>

        <div class="form-group">
            <label for="alias">Lastname:</label>
            <input class="form-control" type="text" name="lastname">
        </div>

        <div class="form-group">
            <label for="intro">Info:</label>
            <textarea class="form-control" type="text" name="info"></textarea>
        </div>

        <div class="form-group">
            <label for="intro">Urls to projects:</label>
            <textarea class="form-control" type="text" name="urls"></textarea>
        </div>


        <div class="content">
            <div class="m-b-md">
                <h3 class="title"></h3>

                @if (session('message'))
                    <div class="success">
                        {{ session('message') }}
                    </div>
                @endif

                <div>
                    <input type="file" name="user_image" />
                </div>
                <br/>
                <div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Send</button>
        </div>

    </form>
    </div>
{{--</body>--}}

@endsection
