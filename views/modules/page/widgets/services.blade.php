<div class="border-b-1">
    <div class="container-fluid">
        <div class="gap"></div>
        <h2 class="text-center head-line">@lang('themes::theme.title.services')</h2>
        <div class="gap"></div>
        <div class="project-carousel owl-carousel" data-items="5" data-items-tablet="2" data-items-mobile="1">
            @foreach($pages as $page)
                <a href="{{ $page->url }}">
                    <div class="project-item item-shadow building">
                        <img alt="{{ $page->title }}" class="img-responsive" src="{{ $page->present()->firstImage(426,579,'fit',80) }}">
                        <div class="project-hover">
                            <div class="project-hover-content">
                                <h3 class="project-title">
                                    {!! $page->title !!}
                                </h3>
                                <p class="project-description">{{ \Str::words(strip_tags($page->body), 15) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
