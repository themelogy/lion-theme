@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page', 'image' => $page->present()->coverImage(1280,250,'fit',80)])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">

            <div class="row">
                <div class="col-md-9">
                    @if(@$page->settings->has_content)
                        {!! $page->body !!}
                    @endif
                    <div class="row">
                        @if(@$page->settings->show_image)
                            @foreach($page->files()->where('zone', 'pageImage')->get() as $file)
                                <div class="col-md-4">
                                    <div class="thumbnail brand">
                                        <a target="_blank"><img src="{{ \Imagy::getImage($file->filename, 'pageImage', ['width' => null, 'height' => 80, 'mode' => 'resize', 'quality' => 70]) }}" alt=""/></a>
                                        <div class="caption">
                                            <h5>{{ $file->description }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
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
