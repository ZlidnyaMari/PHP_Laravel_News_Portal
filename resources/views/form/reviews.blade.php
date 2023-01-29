@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Форма обратной связи</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    <form method="post" action="{{ route('reviews.store') }}">
        @csrf
        <div class = "form-group">
            <label for="user">Как Вас зовут</label>
            <input type="text" name="user" id="user" value="{{ \old('user') }}" class="form-control" required>
        </div>
        <div class = "form-group">
            <label for="reviews">Оставте свой отзыв</label>
            <textarea name="reviews" id="reviews" class="form-control" required>{{ \old('reviews') }}</textarea>
        </div>

        <br>
        <button type="submit" class = "btn btn-success" style="margin-bottom: 10px">Отправить</button>
    </form>
</div>

@endsection
