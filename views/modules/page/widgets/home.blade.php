@if($pages->count()>0)
<div class="bg-color line text-white slogans-home">
    <div class="container">
        <div class="title-home">
            <h1>{{ setting('theme::company-name') }}</h1>
        </div>
        <div class="gap"></div>
        <div class="row row-wrap" data-gutter="100">
            @foreach($pages as $page)
            <div class="col-md-4">
                <a href="{{ $page->url }}">
                <div class="thumb">
                    <header class="thumb-header">
                        <img class="img-responsive lazyloader" src="{{ $page->present()->coverImage(300,100,'fit',50) }}" alt="{{ $page->title }}" />
                        <h4 class="thumb-title">@if($page->settings->icon) <i class="{{ $page->settings->icon }}"></i> @endif {{ $page->title }}</h4>
                    </header>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
