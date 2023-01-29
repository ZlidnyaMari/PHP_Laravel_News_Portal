@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Заказ</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    <form method="post" action="{{ route('orders.store') }}">
        @csrf
        <div class = "form-group">
            <label for="user">Имя</label>
            <input type="text" name="user" id="user" value="{{ \old('user') }}" class="form-control" required>
        </div>
        <div>
            <label for="phone">Контактный телефон</label>
            <input type="phone" name="phone" id="phone" value="{{ \old('phone') }}" class="form-control" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ \old('email') }}" class="form-control" required>
        </div>
        <div class = "form-group">
            <label for="orders">Текст заказа</label>
            <textarea name="orders" id="orders" class="form-control" required>{{ \old('orders') }}</textarea>
        </div>

        <br>
        <button type="submit" class = "btn btn-success" style="margin-bottom: 10px">Отправить</button>

    </form>
</div>

@endsection
