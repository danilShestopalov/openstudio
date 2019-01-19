{{--<html>--}}
{{--<head>--}}

    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
@extends('layouts.app')

@section('content')
    <div class="container">


    <form action="/startup" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title">
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
                    <input type="file" name="startup_image" />
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
