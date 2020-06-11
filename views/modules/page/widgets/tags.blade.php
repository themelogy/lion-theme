@if($tags->count()>0)
    <hr/>
    @foreach($tags as $tag)
        <a class="btn btn-default btn-xs" href="{{ route('page.tag', [$tag->slug]) }}" role="button">{{ $tag->name }}</a>
    @endforeach
@endif