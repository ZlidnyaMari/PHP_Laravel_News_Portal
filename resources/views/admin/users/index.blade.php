@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Все пользователи</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Имя пользователя</th>
                <th>Email пользователя</th>
                <th>Cтатус</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usersList as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin) <p>Администратор</p>@else <p>Пользователь</p>@endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user])}}" style="color: blue">Изм.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Пользователей нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

