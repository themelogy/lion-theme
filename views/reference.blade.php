@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page'])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            @foreach($page->files()->where('zone', 'pageImage')->get() as $file)
                <div class="col-md-3">
                    <div class="thumbnail brand">
                        <a target="_blank"><img src="{{ \Imagy::getImage($file->filename, 'pageImage', ['width' => null, 'height' => 70, 'mode' => 'resize', 'quality' => 70]) }}" alt=""/></a>
                        <div class="caption">
                            <h5>{{ $file->description }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

