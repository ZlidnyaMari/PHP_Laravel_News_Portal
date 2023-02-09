@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить ресурс</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    <form method="post" action="{{ route('admin.source.store') }}">
        @csrf
        <div class = "form-group">
            <label for="news_id">Новости</label>
            <select class="form-control" name="news_id" id="news_id">
                <option value="0">--Выбрать--</option>
            </select>
        </div>
        <div class = "form-group">
            <label for="name">Название ресурса</label>
            <input type="text" name="name" id="name" value="{{ \old('name') }}" class="form-control" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ \old('email') }}" class="form-control" required>
        </div>

        <br>
        <button type="submit" class = "btn btn-success" style="margin-bottom: 10px">Добавить</button>

    </form>
</div>

@endsection