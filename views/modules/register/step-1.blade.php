@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent
    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1'=>'active'])
                    @include('register::errors')

                    {!! Form::open(['route' => ['register.form.step-1.put'], 'method' => 'post', 'id' => 'stepform']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInput('reference_no', trans('register::forms.form.reference_no'), $errors, $form) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInput('company', trans('register::forms.form.company'), $errors, $form) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInput('identity_no', trans('register::forms.form.identity_no'), $errors, $form) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInput('signatory', trans('register::forms.form.signatory'), $errors, $form) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInput('email', trans('register::forms.form.email'), $errors, $form) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInput('work_phone', trans('register::forms.form.work_phone'), $errors, $form, ['placeholder'=>'(555) 555 55 55']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInput('mobile_phone', trans('register::forms.form.mobile_phone'), $errors, $form, ['placeholder'=>'(555) 555 55 55']) !!}
                        </div>
                    </div>

                    {!! Form::submit(trans('register::forms.button.next'), ['class'=>'btn btn-primary mt-sm-10']) !!}

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
            $('#work_phone').mask('(000) 000 00 00');
            $('#mobile_phone').mask('(000) 000 00 00');
        });
    </script>
@endpush