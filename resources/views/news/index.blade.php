@extends('layouts.main')
@section('content')

<div class="row mb-2">
@foreach($newsList as $news)

    <div class="col-md-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <strong class="d-inline-block mb-2 text-primary">{{ $news->author }}</strong>
          <h3 class="mb-0">
            <a class="text-dark" href="{{ route('news.show', ['news'=>$news]) }}">{{ $news->title }}</a>
          </h3>
          <div class="mb-1 text-muted">{{ $news->created_at }}</div>
          <p class="card-text mb-auto">{{ $news->description }}</p>
          <a href="{{ route('news.show', ['news'=>$news]) }}">Читать далее</a>
        </div>
        <img src="{{ Storage::disk('public')->url($news->image) }}">
      </div>
    </div>
@endforeach
</div>
{{ $newsList->links() }}
@endsection
