@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Publish a post:</h2>
        <form action="{{ route('idea.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach($tags as $tag)
                <label>{{ $tag->name }}</label>
                <input type="checkbox" value="{{$tag->id}}" name="tags[]">
            @endforeach
            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="intro">Body:</label>
                <textarea class="form-control" type="text" name="body" id="body"></textarea>
            </div>

            <div class="form-group">
                <label for="logo-input">Фотография</label>
                <input name='image' type="file">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Post</button>
            </div>
        </form>
    </div>
@endsection
