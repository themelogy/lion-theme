@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'video.show'])
        <h1 class="title">{{ $media->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-9">
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $media->embed['code'] ?? null !!}
                    </div>
                    <div class="description mt20">
                        {!! $media->description !!}
                    </div>
                </div>
                <div class="col-md-3">
                    @videoCategories(20)
                </div>
            </div>
        </div>
    </div>
@stop
