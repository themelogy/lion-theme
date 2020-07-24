@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'employee.category'])
        <h1 class="title">{{ $category->name }}</h1>
    @endcomponent

    <div class="page-content mb30 mt10">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @forelse($category->employees as $employee)
                            @includeIf('employee::partials._card')
                        @empty
                            <div class="alert alert-warning">
                                <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                                </button>
                                <p class="text-small">Birim iletişim bulunamadı.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-3">
                    @employeeCategories(20)
                </div>
            </div>
        </div>
    </div>
@stop
