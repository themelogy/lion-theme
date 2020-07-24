@php
    $list = collect();
    $list->put('showContent', $page->settings->show_content ?? true);
    $list->put('gridSize', $page->settings->list_grid ?? 3);
    $list->put('perPage', $page->settings->list_per_page ?? 6);
    $list->put('chunkSize', ceil(12 / $list->get('gridSize')));
    $list->put('columnSize', is_float(12/$list->get('gridSize')) ? $list->get('gridSize') : $list->get('gridSize'));
    $list->put('hasColumn', (int)ceil(12 % $list->get('gridSize')));
    $list->put('listPage', $page->settings->list_page ?? false);

    $childs = $page->children()->orderBy('position')->paginate($list->get('perPage'));

    function colSize($colSize, $colDiv, $loop) {
        if($loop->first) {
            return $colSize;
        } elseif ($loop->last && $colDiv) {
            return $colDiv;
        } else {
            return $colSize;
        }
    }
@endphp

@if($list->get('showContent'))
    <div class="row">
        <div class="col-md-12">
            @include('page::partials.image')
        </div>
    </div>
@endif

@if($list->get('listPage'))
    @php
        $width   = $page->settings->image_width ?? 600;
        $height  = $page->settings->image_height ?? 200;
        $mode    = $page->settings->image_mode ?? 'fit';
        $quality = $page->settings->image_quality ?? 80;
        $hasImg  = $page->settings->show_cover ?? false;
    @endphp
    @if($childs->count()>0)
        @if($page->settings->show_menu)
        <div class="row">
            <div class="col-md-9">
        @endif
        @if($list->get('showContent'))
        <hr/>
        @endif
        @foreach($childs->chunk($list->get('chunkSize')) as $chunks)
            <div class="row">
                @foreach($chunks as $child)
                    <div class="col-md-{{ colSize($list->get('columnSize'), $list->get('hasColumn'), $loop) }}">
                        <div class="thumbnail">
                            <a href="{{ $child->url }}">
                                @if(($image = $child->present()->firstImage($width,$height,$mode,$quality)) && $hasImg)
                                    <img style="width: 100%;" class="img-responsive" src="{{ $image }}" alt="{{ $child->title }}" />
                                @endif
                                <div class="caption">
                                    <h5>{{ $child->title }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        {!! $childs->links('partials.pagination') !!}
                @if($page->settings->show_menu)
            </div>
            <div class="col-md-3">
                @if($page)
                    @parentMenu($page, 'menu', 20)
                @endisset

                @includeWhen($page && ($page->settings->show_doc ?? false),'page::partials.doc')
                @includeWhen($page && ($page->settings->video ?? false), 'page::partials.video')
            </div>
        </div>
            @endif
    @endif
@endif
