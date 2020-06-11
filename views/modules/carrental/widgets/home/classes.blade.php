<div class="container home-class-container">
    <div class="row home-classes-two">
        @foreach($classes as $class)
        <div class="col-md-3">
            <a href="{{ route('carrental.index',['category'=>$class->id]) }}"><span>KİRALIK</span> {{ $class->name }} ARAÇLAR</a>
        </div>
        @endforeach
    </div>
</div>