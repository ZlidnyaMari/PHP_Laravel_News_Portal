@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Все новости</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>

    <a href="{{ route('admin.news.create') }}">Добавить новость</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Изм.</a> &nbsp; <a href="#" style="color: red">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $newsList->links() }}
</div>

@endsection
