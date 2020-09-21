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
                <address>
                    {{ setting("theme::address") }}<br/>
                    <abbr title="Telefon"><i class="fa fa-phone"></i> </abbr><a href="tel:@setting('theme::phone')">@setting('theme::phone')</a><br/>
                    <abbr title="Faks"><i class="fa fa-fax"></i> </abbr><a href="tel:@setting('theme::fax')">@setting('theme::fax')</a><br/>

                    @includeIf('contact::map')
                </address>
            </div>
            <div class="col-md-6">
                @include('contact::form')
            </div>
        </div>
        <div class="gap"></div>
    </div>
@endsection
