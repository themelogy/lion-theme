@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumb'=>'hr.position.view'])
        <h1 class="title">{{ $position->name }} - {{ $position->reference_no }}</h1>
    @endcomponent

    <section class="section-page pt20 pb20 hr-position">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Rererans No : {{ $position->reference_no }}</h2><br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('hr::positions.form.qualification') }}</div>
                        <div class="panel-body">
                            {!! $position->qualification !!}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('hr::positions.form.job_description') }}</div>
                        <div class="panel-body">
                            {!! $position->job_description !!}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('hr::positions.title.personal_criteria') }}</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.criteria.experience') }}</th>
                                    <td>{{ $position->present()->criteria('experience') }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.criteria.military') }}</th>
                                    <td>{{ $position->present()->criteria('military') }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.criteria.education') }}</th>
                                    <td>{{ $position->present()->criteria('education') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('hr::positions.title.position_information') }}</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.personal_number') }}</th>
                                    <td>{{ $position->personal_number }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.position.level') }}</th>
                                    <td>{{ $position->present()->position('level') }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.position.worktime') }}</th>
                                    <td>{{ $position->present()->position('worktime') }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.position.department') }}</th>
                                    <td>{{ $position->present()->position('department') }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">{{ trans('hr::positions.form.position.city') }}</th>
                                    <td>{{ $position->present()->position('city') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('hr.application.form', ['position_id'=>$position->id]) }}">@lang('hr::applications.buttons.create')</a>
                </div>
            </div>
        </div>
    </section>
@endsection
