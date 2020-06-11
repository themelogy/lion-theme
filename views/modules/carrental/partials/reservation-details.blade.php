<h4 class="lh1em mb10">Araç Bilgileri</h4>
<div class="booking-item-payment mb20">
    <header class="clearfix">
        <a class="booking-item-payment-img mt15" href="{{ $car->url }}">
            <img src="{{ $car->present()->firstImage(100,null,'resize',80) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
        </a>
        <h5 class="booking-item-payment-title mt5"><a href="{{ $car->url }}">{!! $car->brand->present()->logo(40).' '.$car->fullname !!}</a></h5>
        <div class="thumb-caption">
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
        </div>
    </header>
    <ul class="booking-item-payment-details">
        <li class="mb5">
            <h5>{{ $reservation->total_day }} günlük kiralama için</h5>
            <div class="booking-item-payment-date">
                <p class="booking-item-payment-date-day">{{ $reservation->pick_at->formatLocalized('%d %B') }}</p>
                <p class="booking-item-payment-date-weekday">{{ $reservation->pick_at->formatLocalized('%A') }}</p>
                <p class="booking-item-payment-date-hour"><small>{{ $reservation->pick_at->format('H:i') }}</small></p>
            </div><i class="fa fa-arrow-right booking-item-payment-date-separator"></i>
            <div class="booking-item-payment-date">
                <p class="booking-item-payment-date-day">{{ $reservation->drop_at->formatLocalized('%d %B') }}</p>
                <p class="booking-item-payment-date-weekday">{{ $reservation->drop_at->formatLocalized('%A') }}</p>
                <p class="booking-item-payment-date-hour"><small>{{ $reservation->drop_at->format('H:i') }}</small></p>
            </div>
            <a class="pull-right btn btn-xs btn-default" href="{{ $car->url }}"><i class="fa fa-calendar"></i> Tarih Değiştir</a>
        </li>
        <li>
            <table class="table table-hover mb0">
                <tr>
                    <th>Alış Lokasyonu</th>
                    <td>{{ $reservation->present()->start_location }}</td>
                </tr>
                <tr>
                    <th>Dönüş Lokasyonu</th>
                    <td>{{ $reservation->present()->return_location }}</td>
                </tr>
            </table>
        </li>
        <li>
            <ul class="booking-item-payment-price">
                <li>
                    <p class="booking-item-payment-price-title">Toplam</p>
                    <p class="booking-item-payment-price-amount">{{ $car->present()->total_price }}</p>
                </li>
                <li>
                    <p class="booking-item-payment-price-title">{{ $reservation->total_day }} gün x</p>
                    <p class="booking-item-payment-price-amount">{{ $car->present()->price }} <small>TL/Gün</small>
                    </p>
                </li>
                <li>
                    <p class="booking-item-payment-price-title">Vergiler</p>
                    <p class="booking-item-payment-price-amount"><small>KDV Hariç</small>
                    </p>
                </li>
            </ul>
        </li>
    </ul>
    <p class="booking-item-payment-total">Toplam Tutar: <span>{{ $car->present()->total_price }}</span>
    </p>
</div>