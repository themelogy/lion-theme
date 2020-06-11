{!! Form::open(['route'=>'carrental.reservation.update', 'method'=>'put', 'rel'=>'nofollow']) !!}
{!! Form::hidden('car_id', $car->id) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-lg from-group-icon-left">
            <label for="formSearchUpLocation3">{{ trans('themes::carrental.reservation.start location') }}</label>
            {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-lg form-group-icon-left">
            <i class="fa fa-calendar input-icon input-icon-highlight no-label"></i>
            {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'class'=>'form-control date-pick']) !!}
            {!! $errors->first("pick_at", '<span class="help-block">:message') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-lg form-group-icon-left">
            <i class="fa fa-clock-o input-icon input-icon-highlight no-label"></i>
            {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
            {!! $errors->first("pick_hour", '<span class="help-block">:message') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-lg from-group-icon-left">
            <label for="formSearchOffLocation3">{{ trans('themes::carrental.reservation.return location') }}</label>
            {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-lg form-group-icon-left">
            <i class="fa fa-calendar input-icon input-icon-highlight no-label"></i>
            {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'class'=>'form-control date-pick']) !!}
            {!! $errors->first("drop_at", '<span class="help-block">:message') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-lg form-group-icon-left">
            <i class="fa fa-clock-o input-icon input-icon-highlight no-label"></i>
            {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
            {!! $errors->first("drop_hour", '<span class="help-block">:message') !!}
        </div>
    </div>
</div>
<button name="reservationUpdate" type="submit" class="btn btn-primary" value="1">KİRALA</button>
{!! Form::close() !!}

@push('css-stack')
    {!! Theme::style('vendor/select2/dist/css/select2.min.css') !!}
@endpush

@push('js-stack')
    {!! Theme::script('vendor/select2/dist/js/select2.min.js', ['defer']) !!}
    <script src="{{ elixir('js/datetime.min.js', 'themes/zirve') }}" defer></script>
@endpush

@push('js-inline')
    <script async>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            $('input.date-pick, .input-daterange input[name="pick_at"]').datepicker().on('changeDate', function () {
                $(this).datepicker('hide');
                $('.input-daterange input[name="drop_at"]').datepicker("show");
            });

            $('.input-daterange input[name="drop_at"]').datepicker().on('changeDate',function () {
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