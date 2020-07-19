<aside id="categories-4" class="widget widget_categories">
    <ul class="list-group">
        @foreach($mediaTypes as $key => $mediaType)
            <li class="list-group-item">
                <a href="{{ route('mediapress.media.category', $key) }}">{{ $mediaType }}</a>
            </li>
        @endforeach
    </ul>
</aside>
