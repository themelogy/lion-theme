@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'contact'])
        <h1 class="title">{{ trans('themes::contact.title') }}</h1>
    @endcomponent
    <div class="container">
        <div class="gap"></div>
        <div class="row" data-gutter="120">
            <div class="col-md-6 r-line-lg">
                <h2>{{ setting('theme::company-name') }}</h2>
                @locations('accordion')
            </div>
            <div class="col-md-6">
                @include('contact::form')
            </div>
        </div>
        <div class="gap"></div>
    </div>
@endsection