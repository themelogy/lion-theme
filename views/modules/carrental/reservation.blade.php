@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.reservation'])
        <h1 class="title">{{ trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]) }}</h1>
    @endcomponent

    <div class="container">
        <div class="booking-item-details">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-4">
                    @include('carrental::partials.reservation-details')
                </div>
                <div class="col-md-8">
                    @include('carrental::partials.reservation-form')
                </div>
            </div>
            <div class="gap"></div>
        </div>
        <div class="gap gap-small"></div>
    </div>
@endsection

@push('js-inline')
    {!! Captcha::script() !!}
@endpush