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
                            @includeIf('employee::partials._card')
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
