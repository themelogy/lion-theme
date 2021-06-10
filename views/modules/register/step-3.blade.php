@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">TAŞIT TANIMA SİSTEMİ ONLİNE BAŞVURU</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active'])
                    {!! Form::open(['route' => ['register.form.step-3.put'], 'method' => 'post', 'class' => 'form']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInputGroup('collateral_amount', trans('register::forms.form.collateral_amount'), $errors, $form, ['style'=>'text-align:right;'], 'TL') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInputGroup('monthly_consumption', trans('register::forms.form.monthly_consumption'), $errors, $form, ['style'=>'text-align:right;'], 'TL') !!}
                        </div>
                    </div>

                    {!! Form::submit('İLERİ', ['class'=>'btn btn-primary mt-sm-10']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/jquery.mask.min.js') !!}
    <script>
        $(document).ready(function(){
            $('#collateral_amount').mask('000000000000000', {reverse: true});
            $('#monthly_consumption').mask('000000000000000', {reverse: true});
        });
    </script>
@endpush