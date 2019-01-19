@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        {{--<div class="navbar-header">--}}
            {{--<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>--}}
        {{--</div>--}}
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('profile') }}">View All Nerds</a></li>
            <li><a href="{{ URL::to('profile/create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>firstname</td>
            <td>lastname</td>
            <td>info</td>
            <td>Operation</td>
        </tr>
        </thead>
        <tbody>
        @foreach($profiles as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->firstname }}</td>
                <td>{{ $value->lastname }}</td>
                <td>{{ $value->info }}</td>
                <td>
                    <form action="/profile/{{ $value->id }}/edit">
                        {!! method_field('patch') !!}
                        {{ csrf_field() }}
                        <button class="btn btn-success">Update</button>
                    </form>

                    <form action="/profile/{{ $value->id }}" method="post">
                        {!! method_field('delete') !!}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
