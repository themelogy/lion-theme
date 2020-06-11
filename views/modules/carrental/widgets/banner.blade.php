<div class="owl-carousel-slider owl-slider owl-carousel-area visible-lg">
    @foreach($cars as $car)
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <div class="bg-blur" style="background-image: url({{ Theme::url() }}/img/slider/slide-{{ $loop->iteration }}.jpg); filter: grayscale(100%);"></div>
        <div class="bg-content">
            <div class="container">
                <div class="loc-info text-right hidden-xs hidden-sm">
                    <img src="{{ $car->present()->firstImage(300,null,'resize',50) }}" alt="{{ $car->present()->fullname }}" />
                    <div class="meta">
                        <h3 class="loc-info-title">{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}</h3>
                        <div class="prices">{{ trans('themes::carrental.titles.start price', ['price'=>$car->prices->price6]) }}</div>
                        <a class="btn btn-white btn-ghost mt20" href="{{ $car->url }}"><i class="fa fa-angle-right"></i>{{ trans('themes::carrental.buttons.rent') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>