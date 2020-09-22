<div class="row">
    <div class="col-md-9">
        @if(@$page->settings->first_content)
            {!! $page->children()->first()->body !!}
        @else
            @if(@$page->settings->show_slide)
                @include('page::partials.slide-image')
            @else
                @include('page::partials.image')
            @endif
            {!! $slot ?? '' !!}
        @endif
        @if(@$page->settings->faq_category)
            @faqCategory($page->settings->faq_category)
        @endif
    </div>
    <div class="col-md-3">
        @if($page)
            @parentMenu($page, 'menu', 20)
        @endisset

        @includeWhen($page && ($page->settings->show_doc ?? false),'page::partials.doc')
        @includeWhen($page && ($page->settings->video ?? false), 'page::partials.video')
    </div>
</div>
