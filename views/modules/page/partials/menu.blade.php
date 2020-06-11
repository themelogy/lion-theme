<div class="row">
    <div class="col-md-9">
        @include('page::partials.image')
        {!! $slot ?? '' !!}
    </div>
    <div class="col-md-3">
        @isset($page->parent)
            @pageChildren($page->parent, 'menu')
        @endisset

        @includeWhen($page && ($page->settings->show_doc ?? false),'page::partials.doc')
        @includeWhen($page && ($page->settings->video ?? false), 'page::partials.video')
    </div>
</div>