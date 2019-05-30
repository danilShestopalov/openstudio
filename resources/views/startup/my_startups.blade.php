@extends('layouts.app')

@section('content')
    <div class="mainstartup">
        <a class="mainstartuptitle" href="{{ route('startup.create') }}">Put your idea<b> into a startup</b></a>
        <startup-list-component url="/api/startups/my"></startup-list-component>
	
    </div>
@endsection
