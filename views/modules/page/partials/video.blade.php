<br/>
<a class="play-1 btn btn-info m-t-10" href="{{ $page->settings->video ?? '' }}"><i class="fa fa-play"></i> {{ trans('themes::theme.buttons.video') }}</a>

@push('scripts')
{!! Theme::style('vendor/youtubeurl/jquery.yu2fvl.css') !!}
{!! Theme::script('vendor/youtubeurl/jquery.yu2fvl.min.js') !!}
@endpush

@push('js_inline')
    <script> jQuery('.play-1').yu2fvl({minPaddingX: 200, minPaddingY: 200}); </script>
@endpush