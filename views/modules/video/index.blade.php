@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'video.index'])
        <h1 class="title">@lang('themes::video.meta.title')</h1>
    @endcomponent

    <div class="page-content mb20 video">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    @foreach($medias->chunk(3) as $chunks)
                    <div class="row">
                        @foreach($chunks as $media)
                            <div class="col-md-4">
                                <a class="popup-iframe hover-img" inline_comment="lightbox" href="{{ $media->video_link }}" data-effect="mfp-fade">
                                    <img class="img-responsive" src="{{ $media->present()->embedImage(600,325,'fit',80) }}" alt="{{ $media->title }}"/>
                                    <i class="fa fa-play box-icon hover-icon round"></i>
                                </a>
                                <a href="{{ $media->url }}">{{ $media->title }}</a>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                    {!! $medias->links('partials.pagination') !!}
                </div>
                <div class="col-md-3">
                    @videoCategories(20)
                </div>
            </div>
        </div>
    </div>
@stop
