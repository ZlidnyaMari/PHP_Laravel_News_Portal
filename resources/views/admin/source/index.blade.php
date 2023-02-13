@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Все ресурсы</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>

    <a href="{{ route('admin.source.create') }}">Добавить ресурс</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>#ID новости</th>
                <th>Имя ресурса</th>
                <th>URL ресурса</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sourceList as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->news_id}}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->url }}</td>
                    <td><a href="{{ route('admin.source.edit', ['source' => $source]) }}">Изм.</a> &nbsp; <a href="#" style="color: red">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- {{ $sourceList->links() }} --}}
</div>

@endsection
