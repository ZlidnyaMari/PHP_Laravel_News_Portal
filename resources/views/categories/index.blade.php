@foreach($categories as $c)
<div>
    <a href="{{ route('categories.show', ['id' =>$c['id']]) }}">{{ $c['name'] }}</a>
</div>
@endforeach
