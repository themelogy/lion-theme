<h4 class="lh1em mb10">Rezervasyon Bilgileri</h4>
<div class="thumbnail" style="padding:20px !important; background-color: #f9f9f9;">
@if(Session::has('success'))
    <div class="alert alert-success fade in alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('errors'))
    <div class="alert alert-danger fade in alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul style="font-size: 12px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route'=>'carrental.reservation.create', 'method'=>'post', 'rel'=>'nofollow']) !!}
{!! Form::hidden('car_id', Request::get('car_id')) !!}
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has("tc_no") ? ' has-error' : '' }}">
            {!! Form::text('tc_no', old('tc_no'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.tc_no')]) !!}
            {!! $errors->first("tc_no", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has("first_name") ? ' has-error' : '' }}">
            {!! Form::text('first_name', old('first_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.first_name')]) !!}
            {!! $errors->first("first_name", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has("last_name") ? ' has-error' : '' }}">
            {!! Form::text('last_name', old('last_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.last_name')]) !!}
            {!! $errors->first("last_name", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4 m-top-10">
        <div class="form-group{{ $errors->has("phone") ? ' has-error' : '' }}">
            {!! Form::text('phone', old('phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.phone')]) !!}
            {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4 m-top-10">
        <div class="form-group{{ $errors->has("mobile_phone") ? ' has-error' : '' }}">
            {!! Form::text('mobile_phone', old('mobile_phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.mobile_phone')]) !!}
            {!! $errors->first("mobile_phone", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4 m-top-10">
        <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
            {!! Form::text('email', old('email'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.email')]) !!}
            {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::textarea('requests', old('requests'), ['class'=>'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>'İstekleriniz']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group mt10{{ $errors->has("g-recaptcha-response") ? ' has-error' : '' }}">
            {!! Captcha::display() !!}
            {!! $errors->first("g-recaptcha-response", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-4">
        {!! Form::submit('REZERVASYON YAP', ['class'=>'btn btn-sm btn-primary']) !!}
        <a class="btn btn-sm btn-danger btn-cancel" href="{{ route('carrental.index') }}">İPTAL</a>
    </div>
</div>
{!! Form::close() !!}
</div>