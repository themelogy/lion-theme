<div class="bg-darken blog-posts border-t-1">
    <div class="container">
        <div class="gap"></div>
        <div class="owl-carousel" data-items="4" data-items-tablet="2" data-items-mobile="1">
            @foreach($posts as $post)
                <div>
                    <div class="thumb">
                        @if($image = $post->present()->firstImage(240,125,'fit',50))
                        <header class="thumb-header">
                            <a class="hover-img curved" href="{{ $post->url }}">
                                <img class="img-responsive img-thumbnail img-rounded lazyloader" src="{{ $image }}" alt="{{ $post->title }}" title="{{ $post->title }}" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                            </a>
                        </header>
                        @endif
                        @unset($image)
                        <div class="thumb-caption">
                            <h4 class="thumb-title" style="font-size: 0.9em;"><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                            <p class="thumb-desc">{{ str_sentence(strip_tags($post->intro), 1) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="gap gap-small"></div>
    </div>
</div>