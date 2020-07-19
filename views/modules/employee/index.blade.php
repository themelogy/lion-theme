@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'employee.index'])
        <h1 class="title">@lang('themes::employee.title')</h1>
    @endcomponent

    <div class="page-content mb30 mt10">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    @foreach($employees->chunk(2) as $chunks)
                    <div class="row">
                        @foreach($chunks as $employee)
                        <div class="col-md-6">
                            <div class="business-card">
                                <div class="user">
                                    <i class="fa fa-user"></i>
                                </div>
                                <ul>
                                    <li><h4>{{ $employee->fullname }}</h4></li>
                                    @if($employee->position)
                                    <li>{{ $employee->position }}</li>
                                    @endif
                                    @if($employee->mobile)
                                    <li><span>@lang('themes::employee.fields.mobile')</span> {{ $employee->mobile }}</li>
                                    @endif
                                    @if($employee->phone)
                                        <li><span>@lang('themes::employee.fields.phone')</span> <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></li>
                                    @endif
                                    @if($employee->email)
                                    <li><span>@lang('themes::employee.fields.email')</span> <a href="mailto:{!! Html::email($employee->email) !!}">{!! Html::email($employee->email) !!}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    @employeeCategories(20)
                </div>
            </div>
        </div>
    </div>
@stop
