@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить ресурс</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.source.store') }}">
        @csrf
        <div class = "form-group">
            <label for="news_id">Новости</label>
            <select class="form-control @error('news_id') is_inbalid @enderror" name="news_id" id="news_id">
                <option value="0">--Выбрать--</option>
            @foreach ($newsList as $news)
                <option @if((int) old('news_id') === $news->id) selected @endif value={{ "$news->id" }}>{{ "$news->title" }}</option>
            @endforeach
            </select>
        </div>
        <div class = "form-group">
            <label for="name">Название ресурса</label>
            <input type="text" name="name" id="name" value="{{ \old('name') }}" class="form-control @error('name') is_inbalid @enderror" required>
        </div>
        <div>
            <label for="url">Адрес ресурса</label>
            <input type="url" name="url" id="url" value="{{ \old('url') }}" class="form-control @error('url') is_inbalid @enderror" required>
        </div>

        <br>
        <button type="submit" class = "btn btn-success" style="margin-bottom: 10px">Добавить</button>

    </form>
</div>

@endsection
