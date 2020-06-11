<div class="top-area show-onload">
    <div class="bg-holder full">
        <div class="bg-front full-height bg-front-mob-rel">
            <div class="container full-height">
                <div class="rel full-height">
                    <div class="tagline visible-lg" id="tagline">
                        {!! Menu::render('tagline', \Themes\Zirve\Presenter\TopMenuPresenter::class) !!}
                    </div>
                    <div class="search-tabs search-tabs-bg search-tabs-bottom mb50">
                        <div class="search-form search-form2" id="search-form2">
                            <h2>Ankara'da uygun fiyat ve avantajlarla araç kiralayın!</h2>
                            {!! Form::open(['route' => 'carrental.index', 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-12">
                                                    <div class="form-group form-group-lg">
                                                        {!! Form::label('start_location', trans('themes::carrental.reservation.start location')) !!}
                                                        {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Alış Tarihi</label>
                                                        {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                        <label>Alış Saati</label>
                                                        {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-12">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        {!! Form::label('return location', trans('themes::carrental.reservation.return location')) !!}
                                                        {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Dönüş Tarihi</label>
                                                        {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                        <label>Dönüş Saati</label>
                                                        {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="hidden-xs">&nbsp;</label>
                                    <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @themeSlide('anasayfa')
        <div class="bg-img hidden-lg" style="background-image:url({!! Theme::url('img/slider/slide-1.jpg') !!});"></div>
        <div class="bg-mask hidden-lg"></div>
    </div>
</div>

@push('css-stack')
    {!! Theme::style('vendor/select2/dist/css/select2.min.css') !!}
@endpush

@push('js-stack')
    <script src="{{ elixir('js/datetime.min.js', 'themes/zirve') }}" defer></script>
    {!! Theme::script('vendor/select2/dist/js/select2.min.js', ['defer']) !!}
@endpush

@push('js-inline')
    <script async>
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

            drop_at.datepicker('setDate', '+2d').on('changeDate', function () {
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