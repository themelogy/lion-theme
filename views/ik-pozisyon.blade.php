@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page', 'image' => $page->present()->coverImage(1280,250,'fit',80)])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">

            <div class="row">
                <div class="col-md-9">
                    @hrPositions(20)
                </div>
                <div class="col-md-3">
                    @if($page)
                        @parentMenu($page, 'menu', 20)
                    @endisset

                    @includeWhen($page && ($page->settings->show_doc ?? false),'page::partials.doc')
                    @includeWhen($page && ($page->settings->video ?? false), 'page::partials.video')
                </div>
            </div>
        </div>
    </div>
@stop
