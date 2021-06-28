@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form" id="stepform">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active', 'step4' => 'active', 'step5'=>'active'])

                    <div class="jumbotron text-center">
                        <h3 class="display-3">Kısa Mesaj Doğrulama Ekranı</h3><br/>
                        <codeinput lifetime="180000" api="{{ route('register.form.code') }}" validate="{{ route('register.form.validate') }}" redirect="{{ route('register.form.finish') }}"></codeinput>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    <script src="{{ mix('/mix.js') }}"></script>
    <script src="{{ mix('/modules/register/js/app.js') }}"></script>
    <script>
        var smsApi = {
          url: '{{ route('register.form.code') }}'
        };
    </script>
@endpush
