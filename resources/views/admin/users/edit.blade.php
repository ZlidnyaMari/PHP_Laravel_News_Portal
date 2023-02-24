@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Изменить пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.users.update', ['user' => $user])}}">
        @csrf
        @method('put')
        <div class = "form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class = "form-group">
            <label for="email">Email пользователя</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
        </div>
        <div class = "form-group">
            <label for="is_admin">Статус</label>
            <select class="form-control" name="is_admin" id="is_admin">
                <option @if((int)$user->is_admin === \App\Models\User::ADMIN) selected @endif value="{{ \App\Models\User::ADMIN }}">Админ</option>
                <option @if((int)$user->is_admin === \App\Models\User::USER) selected @endif value="{{ \App\Models\User::USER }}">Пользователь</option>
            </select>
        </div>

        <button type="submit" class = "btn btn-success">Сохранить</button>
    </form>

</div>
@endsection
