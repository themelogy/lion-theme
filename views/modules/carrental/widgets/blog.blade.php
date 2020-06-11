<div class="sidebar-widget">
    <h4>Kiralık Araçlar</h4>
    <div class="owl-carousel" id="owl-carousel" data-items="1" data-dots="false">
        @foreach($cars as $car)
            <div>
                <div class="thumb">
                    <header class="thumb-header">
                        {!! Html::image($car->brand->present()->firstImage(40,null,'resize',70), $car->brand->name, ['style'=>'width:20px;']) !!}
                        <a href="{{ $car->url }}">
                            <img src="{{ $car->present()->firstImage(null,120,'resize',80) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
                        </a>
                    </header>
                    <div class="thumb-caption">
                        <h5 class="thumb-title"><a class="text-darken" href="{{ $car->reservationUrl }}">Kiralık {{ $car->fullname }}</a></h5><small>{{ $car->carclass->name }}</small>
                        <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                            <li rel="tooltip" data-placement="top" title="Yolcu"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x {{ $car->series->person }}</span>
                            </li>
                            <li rel="tooltip" data-placement="top" title="Araç Tipi"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x {{ $car->present()->body_type }}</span>
                            </li>
                            <li rel="tooltip" data-placement="top" title="Bagaj Hacmi"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x {{ $car->series->baggage }}</span>
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