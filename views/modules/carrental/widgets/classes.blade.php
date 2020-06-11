<h3>Kategori</h3>
<ul class="list booking-filters-list">
    @foreach($classes as $class)
    <li>
        <a href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>$class->id, 'brand'=>request()->get('brand')]) }}"><i class="fa fa-angle-right mr5"></i> {{ $class->name }}</a>
        @if(request()->get('category') == $class->id)
            {!! link_to_route('carrental.index', '[x]', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'brand'=>request()->get('brand')]) !!}
        @endif
    </li>
    @endforeach
</ul>