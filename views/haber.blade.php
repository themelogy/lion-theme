@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page'])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            @newsFindByCategory($page->settings->news_category, 100, "category-posts", 6)
        </div>
    </div>
@stop

