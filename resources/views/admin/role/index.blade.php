@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach($roles as $role)
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
