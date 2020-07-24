<div class="row">
    <div class="col-md-12">
        @foreach($posts->chunk(2) as $chunk)
            <div class="row">
                @foreach($chunk as $post)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <header class="post-header">
                                <a class="hover-img" href="{{ $post->url }}">
                                    <img class="lazyloader" data-src="{{ $post->present()->firstImage(800,350,'fit',80) }}" alt="{{ $post->title }}" title="{{ $post->title }}" /><i class="fa fa-link box-icon-# hover-icon round"></i>
                                </a>
                            </header>
                            <div class="post-inner">
                                <h5 class="post-title"><a class="text-darken" href="{{ $post->url }}">{{ $post->title }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        @isset($post->links)
        {!! $posts->links('partials.pagination') !!}
        @endisset
    </div>
</div>
