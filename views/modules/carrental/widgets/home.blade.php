<div class="container">
    <div class="gap"></div>
    <div class="owl-carousel" id="owl-carousel" data-items="4" data-items-mobile="1" data-items-tablet="2" data-dots="false">
        @foreach($cars as $car)
        <div>
            <div class="thumb">
                <header class="thumb-header">
                    {!! Html::image($car->brand->present()->firstImage(20,null,'resize',50), $car->brand->name, ['style'=>'width:20px;', 'class'=>'lazyloader']) !!}
                    <a href="{{ $car->url }}">
                        <img class="lazyloader" src="{{ $car->present()->firstImage(240,null,'resize',50) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
                    </a>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="{{ $car->reservationUrl }}">{{ $car->fullname }}</a></h5>
                    <a href="{{ route('carrental.index', ['category'=>$car->carclass->id]) }}"><small>{{ $car->carclass->name }}</small></a>
                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                        <li rel="tooltip" data-placement="top" title="Yolcu"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x{{ $car->series->person }}</span>
                        </li>
                        <li rel="tooltip" data-placement="top" title="Araç Tipi"><i class="im im-car-doors"></i><span style="font-size: 8px;" class="booking-item-feature-sign">{{ $car->present()->body_type }}</span>
                        </li>
                        <li rel="tooltip" data-placement="top" title="Bagaj Hacmi"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x{{ $car->series->baggage }}</span>
                        </li>
                        <li rel="tooltip" data-placement="top" title="Vites"><i class="im im-shift"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->transmission }}</span>
                        </li>
                        <li rel="tooltip" data-placement="top" title="Yakıt Tipi"><i class="im im-electric"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->fuel_type }}</span>
                        </li>
                    </ul>
                    <p class="text-darken mb0 text-color">{{ $car->prices->price6 }}<small> TL / Gün</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>