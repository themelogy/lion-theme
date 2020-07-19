@extends('layouts.master')

@section('content')
    @php
        $breadcrumb = isset($mediaTypes[$category['slug']]) ? 'mediapress.category' : 'mediapress.index';
    @endphp


    @component('partials.components.title', ['breadcrumbs'=>$breadcrumb])
        <h1 class="title">{{ $mediaTypes[$category['slug']] ?? trans('mediapress::mediapress.title.mediapress') }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    @foreach($medias as $media)
                        <article class="post-wrapper press m-bot-20">
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="hover-img" href="{{ $media->url }}">
                                        <img class="img-responsive" src="{{ $media->present()->media_image(800,600,'fit',50) }}" alt="{{ $media->title }}" title="{{ $media->title }}">
                                        <h5 class="hover-title hover-hold">{{ $media->brand }}</h5>
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <h2 class="entry-title"><a href="{{ $media->url }}">{{ $media->title }}</a></h2>
                                    <p>{!! Str::words(strip_tags($media->description), 20) !!}</p>
                                    <a class="browser-default btn btn-primary btn-xs m-top-5" href="{{ $media->url }}">{{ trans('global.buttons.read more') }}</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {!! $medias->links('partials.pagination') !!}
                </div>
                <div class="col-md-3">
                    @includeIf('mediapress::partials.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
