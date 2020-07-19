@if($media = $page->videos->first())
    <div class="embed-responsive embed-responsive-16by9 mb20">
        <iframe src="{!! $media->embedurl !!}" frameborder="0" allowfullscreen></iframe>
    </div>
@endif
