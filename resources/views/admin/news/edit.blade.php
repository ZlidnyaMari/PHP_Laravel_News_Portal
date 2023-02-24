@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Изменить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0"> </div>
</div>

<div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class = "form-group">
            <label for="category_ids">Категории</label>
            <select class="form-control" name="category_ids[]" id="category_ids" multiple>
                <option value="0">--Выбрать--</option>
                @foreach ($categories as $category)
                    <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value={{ "$category->id" }}>{{ "$category->title" }}</option>
                @endforeach
            </select>
        </div>
        <div class = "form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ $news->title }}" class="form-control">
        </div>
        <div class = "form-group">
            <label for="author">Автор</label>
            <input type="text" name="author" id="author" value="{{ $news->author }}" class="form-control">
        </div>
        <div class = "form-group">
            <label for="status">Статусы</label>
            <select class="form-control" name="status" id="status">
                @foreach ($statuses as $status)
                    <option @if($news->status === $status) selected @endif>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class = "form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class = "form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control">{{ $news->description }}</textarea>
        </div>

        <br>

        <button type="submit" class = "btn btn-success">Сохранить</button>
    </form>

</div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
