@extends('layouts.app')

@section('content')
    <div class="container">
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Likes</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach($ideas as $idea)
            <tr>
                <td>{{ $idea->title }}</td>
                <td>{{ $idea->body }}</td>
                <td>{{ count($idea->users) }}</td>
                <td>{{ $idea->status }}</td>
                <td>
                    <form action="{{ route('admin.idea.approve', $idea->id) }}" method="post">
                        {{ csrf_field() }}
                    @if ($idea->status == 0)
                            <button class="btn btn-default" type="submit">Одобрить</button>
                        @else
                            <button class="btn btn-default" type="submit">Запретить</button>
                    @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
