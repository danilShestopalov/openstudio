@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Publish a post:</h2>
        <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            @foreach($permissions as $permission)
                <input type="checkbox" value="{{$permission->id}}" name="permissions[]">
            @endforeach
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
