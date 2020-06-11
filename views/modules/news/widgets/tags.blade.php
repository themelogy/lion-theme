@isset($tags)
    @if($tags->count()>0)
        <div class="sidebar-widget">
            <h4>{{ trans('tag::tags.tag') }}</h4>
            @foreach($tags as $tag)
                <a href="{{ route('blog.tag', $tag->slug) }}"><span class="label label-default">{{ $tag->name }}</span></a>
            @endforeach
        </div>
    @endif
@endisset