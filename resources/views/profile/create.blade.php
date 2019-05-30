{{--<html>--}}
{{--<head>--}}

    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
@extends('layouts.app')

@section('content')
    <section class="post">
		<img class="yula" src="../img/yula.png">
		<img class="twocirc" src="../img/twocirc.png">
        <div>
            <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Раскажите о себе</h1>
                <label for="prodname">Ник</label>
                <input type="text" placeholder="" name="nickname" id="prodname" value="{{ old('nickname') }}">
                <label for="prodname">Обо мне</label>
                <textarea type="text" placeholder="" name="about" id="prodname">{{ old('about') }}</textarea>
                <label for="desc">Мои способности</label>
                <select-tags-component url="/api/skills" name="skills"></select-tags-component>
                <div class="picss">
                    <div>
                        <label for="">Аватарка</label>
                        <upload-file-component name="avatar"></upload-file-component>
                    </div>
                    <div>
                        <label for="">Шапка профиля</label>
                        <upload-file-component name="background"></upload-file-component>
                    </div>
                </div>

                @if ($errors)
                    <span role="alert">
                <strong>{{ $errors->first() }}</strong>
            </span>
                @endif
                <button>Send</button>
            </form>
        </div>
    </section>
@endsection
