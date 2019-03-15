@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach($permissions as $permission)
                <li>{{ $permission->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
