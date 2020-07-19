<aside id="categories-4" class="widget widget_categories">
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{ $category->url }}">{{ $category->title }}</a>
            </li>
        @endforeach
    </ul>
</aside>
