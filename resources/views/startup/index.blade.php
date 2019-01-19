@extends('layouts.app')

@section('content')
<div class="container">

    {{--<nav class="navbar navbar-inverse">--}}
        {{--<div class="navbar-header">--}}
            {{--<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>--}}
        {{--</div>--}}
        {{--<ul class="nav navbar-nav">--}}
            {{--<li><a href="{{ URL::to('profile') }}">View All Nerds</a></li>--}}
            {{--<li><a href="{{ URL::to('profile/create') }}">Create a Nerd</a>--}}
        {{--</ul>--}}
    {{--</nav>--}}

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Info</td>
            <td>Creater</td>
            <td>Operation</td>
        </tr>
        </thead>
        <tbody>
        @foreach($startups as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->info }}</td>
                <td>{{ $value->creater_id }}</td>
                <td>
                    @if (Auth::user()->id == $value->creater_id)
                    <form action="/startup/{{ $value->id }}/edit">
                        {!! method_field('patch') !!}
                        {{ csrf_field() }}
                        <button class="btn btn-warning">Update</button>
                    </form>

                    <form action="/startup/{{ $value->id }}" method="post">
                        {!! method_field('delete') !!}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                        @else
                        <form action="/startup/{{ $value->id }}/like" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-succes" type="submit">like</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
