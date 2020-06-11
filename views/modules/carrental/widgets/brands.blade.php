<h3>Marka</h3>
<ul class="list booking-filters-list">
    @foreach($brands as $brand)
    <li>
        <a href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category'), 'brand'=>$brand->id]) }}">{!! $brand->present()->logo(30) !!} <span class="ml10">{{ $brand->name }} ({{ $brand->cars()->count() }})</span></a>
        @if(request()->get('brand') == $brand->id)
            {!! link_to_route('carrental.index', '[x]', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category')], ['style'=>'color:gray;']) !!}
        @endif
    </li>
    @endforeach
</ul>