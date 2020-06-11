@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'faq.view'])
        <h1 class="title">{{ $faq->title }}</h1>
    @endcomponent

    <div class="page-content">
        <div class="container">
            <div class="col-md-9">
                {!! $faq->content !!}
            </div>
            <div class="col-md-3">
                <aside class="booking-filters mb10" style="width: 100%;">
                    @faqCategories()
                </aside>
            </div>
        </div>
    </div>
@stop
