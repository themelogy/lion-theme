@if($file = $page->present()->files->first())
<a class="btn btn-warning page-doc" href="{{ url($file->path) }}" target="_blank">
    <i class="fa fa-file-text-o m-r-5"></i> {{ trans('themes::theme.buttons.document') }}
</a>
@endif