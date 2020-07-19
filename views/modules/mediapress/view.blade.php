@extends('layouts.master')

@section('content')

    @component('partials.components.title', ['breadcrumbs'=>'mediapress.view'])
        <h1 class="title">{{ $media->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    <span class="label label-danger pull-left-lg">{{ $media->brand }}</span>
                    <span class="pull-right-lg">{{ $media->release_at->formatLocalized('%d %B %Y') }}</span>

                    @if($media->media_type == 'tv')
                        <div class="embed-responsive embed-responsive-16by9 mb20">
                        {!! $media->present()->media_desc !!}
                        </div>
                    @else
                        <div style="padding:10px 0;" id="popup-gallery">
                            <a class="hover-img popup-gallery-image" href="{{ $media->present()->media_image(null,500,'resize',50) }}">
                                <img class="img-responsive" src="{{ $media->present()->media_image(900,500,'fit',50) }}" alt="{{ $media->title }}" title="{{ $media->title }}"><i class="fa fa-link box-icon hover-icon round"></i>
                            </a>
                        </div>
                    @endif
                    <div class="description">
                        {!! $media->description !!}
                        <br/>
                        @if($media->media_desc)
                            Kaynak : <a href="{{ $media->media_desc }}" target="_blank">{{ $media->media_desc }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    @includeIf('mediapress::partials.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
