<div class="sidebar-widget">
    <h4>Son Yazılar</h4>
    <ul class="thumb-list">
        @foreach($posts as $post)
            <li>
                <a href="{{ $post->url }}">
                    <img class="img-rounded lazyloader" src="{{ $post->present()->firstImage(100,50,'fit',80) }}" alt="{{ $post->title }}" title="{{ $post->title }}" />
                </a>
                <div class="thumb-list-item-caption">
                    <h5 class="thumb-list-item-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h5>
                    <p class="thumb-list-item-meta">{{ $post->created_at->formatLocalized('%d %B %Y') }}</p>
                    <p class="thumb-list-item-desciption">{!! Str::words(strip_tags($post->intro), 10) !!}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>