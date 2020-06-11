<div class="sidebar-widget">
    <h4>Arşiv</h4>
    <ul class="icon-list list-category">
        @foreach($months as $month)
        <li><a href="#"><i class="fa fa-angle-right"></i>{{ \Carbon\Carbon::createFromDate(null,$month->month)->formatLocalized('%B') }} ({{ $month->post_count }})</a>
        </li>
        @endforeach
    </ul>
</div>