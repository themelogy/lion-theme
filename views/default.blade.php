@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page', 'image' => $page->present()->coverImage(1280,300,'fit',80)])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">

            @if(isset($page->parent) && ($page->parent->settings->show_menu ?? false) && !($page->settings->full_page ?? false))
                @include('page::partials.menu')
            @elseif($page && ($page->settings->list_page ?? false))
                @include('page::partials.list')
            @elseif($page && !($page->settings->list_page ?? false) && !($page->parent->settings->show_menu ?? false))
                @if(@$page->settings->show_slide)
                    @include('page::partials.slide-image')
                @else
                    @include('page::partials.image')
                @endif
            @endif

            @pageTags($page, 10)
        </div>
    </div>
@stop
