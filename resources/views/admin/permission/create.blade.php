@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Publish a post:</h2>
        <form action="{{ route('admin.permission.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name:</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </form>
    </div>
@endsection
