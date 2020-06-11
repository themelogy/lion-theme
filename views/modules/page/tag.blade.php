@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page.tag'])
        <h1 class="title">{!! trans('themes::tags.tag', ['tag'=>$tag->name]) !!}</h1>
    @endcomponent

    <div class="page-content">
        <div class="container">
            @isset($pages)
                @foreach($pages->chunk(3) as $chunks)
                    <div class="row">
                        @foreach($chunks as $page)
                            <div class="col-md-4 col-xs-12">
                                <div class="child-page thumbnail">
                                    @if($page->hasImage())
                                    <a href="{{ $page->url }}">
                                        <img src="{{ $page->present()->firstImage(356, 150, "fit", 50) }}" alt="{{ $page->title }} - {{ $tag->name }}" />
                                    </a>
                                    @endif
                                    <div class="caption">
                                        <h4 class="title"><a href="{{ $page->url }}">{{ $page->title }}</a></h4>
                                        <p>{!! ucfirst(Str::words(Str::replaceFirst('transfer', $tag->name.' ', strip_tags(strtolower(html_entity_decode($page->body)))), 20)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @unset($page)
                    </div>
                @endforeach
                @unset($chunks)
            @endisset
        </div>
    </div>
@stop
