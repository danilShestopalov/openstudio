@extends('layouts.app')

@section('content')
<section class="startup1">
	<img class="yula" src="../img/yula.png">
		<img class="twocirc" src="../img/twocirc.png">
    <form action="{{ route('startup.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
		@if ($errors)
            <span role="alert">
                <strong>{{ $errors->first() }}</strong>
            </span>
        @endif
        <h1>Опиши здесь свою идею</h1>
        <label for="prodname">Название</label>
        <input placeholder="Придумай интересное название" type="text" name="title"  id="prodname" value="{{ old('title') }}">
        <label for="deviz">Подзаголовок</label>
        <input placeholder="Напиши завораживающий подзаголовок" type="text" name="tagline"  id="deviz" value="{{ old('tagline') }}">
        <label for="desc">Описание </label>
        <textarea type="text" name="info" placeholder="Опиши свою идею во всех подробностях" id="desc">{{ old('info') }}</textarea>
        <div class="picss">
            <div>
                <label for="">Картинка</label>
                <upload-file-component name="logo"></upload-file-component>
            </div>
        </div>
        <button class="send">Отправить</button>
    </form>
    <div class="musordiv2">
        <img src="/assets/img/ins.png" alt="">
    </div>
</section>
@endsection
