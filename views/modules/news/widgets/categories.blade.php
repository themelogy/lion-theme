<div class="sidebar-widget">
    <h4>Kategori</h4>
    <ul class="icon-list list-category">
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}"><i class="fa fa-angle-right"></i>{{ $category->name }} <small >({{ $category->posts()->count() }})</small></a></li>
        @endforeach
    </ul>
</div>