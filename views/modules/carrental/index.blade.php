@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.sort'])
        <h1 class="title">{{ $title }}</h1>
    @endcomponent

    <div class="container">
        <div class="gap"></div>
        <div class="booking-item-dates-change mb30">
            {!! Form::open(['route' => ['carrental.index', 'sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category'), 'brand'=>request()->get('brand')], 'method' => 'post', 'rel'=>'nofollow']) !!}
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-icon-left">
                                    {!! Form::label('start_location', trans('themes::carrental.reservation.start location')) !!}
                                    {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                            {!! Form::label('pick_at', trans('themes::carrental.reservation.pickup date')) !!}
                                            {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="padding: 0 5px;">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                            {!! Form::label('pick_hour', trans('themes::carrental.reservation.hour')) !!}
                                            {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-icon-left">
                                    {!! Form::label('return location', trans('themes::carrental.reservation.return location')) !!}
                                    {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                            {!! Form::label('drop_at', trans('themes::carrental.reservation.drop date')) !!}
                                            {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('Y-m-d'), 'class'=>'form-control date-pick']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="padding: 0 5px;">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                            {!! Form::label('drop_hour', trans('themes::carrental.reservation.hour')) !!}
                                            {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label>&nbsp;</label>
                        <button name="reservationUpdate" type="submit" class="btn btn-primary btn-lg" value="1"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="nav-drop booking-sort">

                    @php
                        $sortList = collect();
                        $sortList->put('price1', ['key'=>'price', 'name'=>'Fiyat (Azalan)', 'dir'=>'desc']);
                        $sortList->put('price2', ['key'=>'price', 'name'=>'Fiyat (Artan)', 'dir'=>'asc']);
                        $sortList->put('name1', ['key'=>'name', 'name'=>'Marka (A-Z)', 'dir'=>'desc']);
                        $sortList->put('name2', ['key'=>'name', 'name'=>'Marka (Z-A)', 'dir'=>'asc']);
                        $currentSort = request()->has('sort') && request()->has('dir') ? $sortList->where('key', request()->get('sort'))->where('dir', request()->get('dir'))->first() : $sortList->first();
                    @endphp

                    <h5 class="booking-sort-title">
                        <a href="#">{{ $currentSort['name'] }}<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
                    </h5>

                    <ul class="nav-drop-menu">
                        @foreach($sortList->all() as $sort)
                            <li>{!! link_to_route('carrental.index', $sort['name'], ['sort'=>$sort['key'], 'dir'=>$sort['dir'], 'category'=>request()->get('category'), 'brand'=>request()->get('brand')], ['rel'=>'nofollow']) !!}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="pull-right"><small>({{ $cars->total() }} araç bulundu)</small></div>
                <ul class="booking-list">
                    @forelse($cars as $car)
                    <li>
                        <a class="booking-item" href="{{ $car->url }}" rel="nofollow">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="booking-item-car-img">
                                        <div class="label label-warning">{{ $car->carclass->name }}</div>
                                        {!! Html::image($car->present()->firstImage(180,null,'resize',80), $car->fullname, ['class'=>'mt5 lazyloader']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="booking-item-car-title">{{ $car->fullname }}</h3>
                                            <ul class="booking-item-features booking-item-features-sign clearfix">
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
                                    </div>
                                </div>
                                <div class="col-md-3"><span class="booking-item-price">{{ $car->present()->price }}</span> <span>TL/gün</span>
                                    @isset($reservation->total_day)
                                    <p>{{ $reservation->total_day }} Gün - {{ $car->present()->total_price }}</p>
                                    @endisset
                                    <span class="btn btn-xs btn-primary">Rezervasyon</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @empty
                        <div class="alert alert-warning">
                            <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                            </button>
                            <p class="text-small">Araç Bulunamadı.</p>
                        </div>
                    @endforelse
                </ul>
                <div class="row">
                    <div class="col-md-12">
                        {!! $cars->appends(request()->query())->links('carrental::pagination.default') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt30">
                <div class="booking-filters mb20">
                    @carClasses()
                </div>
                <div class="booking-filters">
                    @carBrands()
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </div>
@endsection

@push('css-stack')
    {!! Theme::style('vendor/select2/dist/css/select2.min.css') !!}
@endpush

@push('js-stack')
    {!! Theme::script('vendor/select2/dist/js/select2.min.js', ['defer']) !!}
    <script src="{{ elixir('js/datetime.min.js', 'themes/zirve') }}" defer></script>
@endpush

@push('js-inline')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('.date-pick').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            var pick_at = $('input[name="pick_at"]');
            var drop_at = $('input[name="drop_at"]');

            function dropMinDate() {
                var start_at = new Date(pick_at.datepicker('getDate'));
                start_at.setDate(start_at.getDate()+1);
                drop_at.datepicker('setStartDate', start_at);
                drop_at.datepicker('setDate', start_at);
            }

            pick_at.datepicker().on('changeDate', function () {
                dropMinDate();
                $(this).datepicker('hide');
            });

            drop_at.datepicker().on('changeDate', function () {
                $(this).datepicker('hide');
            });


            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });

            $('select').select2();
        });
    </script>
@endpush