<h3>Kategori</h3>
<ul class="list booking-filters-list">
    @foreach($categories as $category)
    <li>
        <a href="{{ $category->url }}">{{ $category->name }}</a>
    </li>
    @endforeach
</ul>