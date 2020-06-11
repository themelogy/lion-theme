@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.car'])
        <h1 class="title">{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}</h1>
    @endcomponent

    <div class="container">
        <div class="booking-item-details">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-8">
                    <h3 class="lh1em pull-left">{!! $car->brand->present()->logo(50).' '.$car->fullname !!}</h3>
                    <span class="label label-warning pull-right">{{ $car->carclass->name }}</span>
                    <div class="clearfix"></div>
                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                        @foreach($car->present()->images(800,null,'resize',80) as $image)
                            <img src="{{ $image }}" alt="{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}" title="{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}" />
                        @endforeach
                    </div>
                    <div class="row row-wrap">
                        <div class="gap"></div>
                        <div class="col-md-12">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#car-features" data-toggle="tab">Araç Özellikleri</a></li>
                                    <li><a href="#car-details" data-toggle="tab">Açıklama</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="car-features">
                                        <ul class="booking-item-features booking-item-features-sign pl20 pt20 clearfix">
                                            <li rel="tooltip" data-placement="top" title="Yolcu"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x{{ $car->series->person }}</span>
                                            </li>
                                            <li rel="tooltip" data-placement="top" title="Araç Tipi"><i class="im im-car-doors"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->body_type }}</span>
                                            </li>
                                            <li rel="tooltip" data-placement="top" title="Bagaj Hacmi"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x{{ $car->series->baggage }}</span>
                                            </li>
                                            <li rel="tooltip" data-placement="top" title="Vites"><i class="im im-shift"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->transmission }}</span>
                                            </li>
                                            <li rel="tooltip" data-placement="top" title="Yakıt Tipi"><i class="im im-electric"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->fuel_type }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane pl20 pt20 pr20 fade" id="car-details">
                                        <p class="align-justify">Şirketimiz filosuna katılmış olan 0 km {{ $car->present()->fullname }} araçlarımız hizmetinize hazır durumdadır. Yakıt konusunda oldukça tasarruf sağlayan Kiralık {{ $car->present()->fullname }} konforu ve yol tutuşu ilede siz değerli müşterilerimize rahat bir sürüş keyfi için bir telefon kadar uzakta! Ankara oto kiralama sektöründe bu aracı en uygun fiyata {{ setting('theme::company-name') }} güvencesi ile temin edebilirsiniz.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="booking-item-dates-change">
                        @if($errors->count()>0)
                        <div class="alert alert-danger">
                            <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                            </button>
                            <p class="text-small">{{ $errors->first() }}</p>
                        </div>
                        @endif
                        @include('carrental::partials.reservation-date')
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
        <div class="gap gap-small"></div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/fotorama.js', ['defer']) !!}
@endpush