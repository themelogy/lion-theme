<aside id="categories-4" class="widget widget_categories">
    <ul class="list-group">
        @foreach($children as $child)
            <li class="list-group-item">
                @if(collect(Request::segments())->search($child->slug))
                    <a class="active" href="{{ $child->url }}">{{ $child->title }}</a>
                @else
                    <a href="{{ $child->url }}">{{ $child->title }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</aside>
