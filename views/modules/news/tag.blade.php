@extends('news::layouts.master')

@section('news content')
    @component('partials.components.title', ['breadcrumbs'=>'news.tag'])
        <h1 class="title">{{ trans('news::post.title.tag', ['tag'=>$tag->name]) }}</h1>
    @endcomponent
    <div class="container mt30">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts->chunk(2) as $chunk)
                    <div class="row">
                        @foreach($chunk as $post)
                            <div class="col-md-6">
                                <div class="article post">
                                    <header class="post-header">
                                        <a class="hover-img" href="{{ $post->url }}">
                                            <img class="lazyloader" src="{{ $post->present()->firstImage(360,190,'fit',80) }}" alt="{{ $post->title }}" title="{{ $post->title }}" /><i class="fa fa-link box-icon-# hover-icon round"></i>
                                        </a>
                                    </header>
                                    <div class="post-inner">
                                        <h4 class="post-title"><a class="text-darken" href="{{ $post->url }}">{{ $post->title }}</a></h4>
                                        <ul class="post-meta">
                                            <li><i class="fa fa-th-large"></i> <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></li>
                                            <li><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a></li>
                                            <li><i class="fa fa-user"></i> <a href="{{ $post->present()->authorUrl }}">{{ $post->author->fullname }}</a></li>
                                        </ul>
                                        <p class="post-desciption">{!! ucfirst(str_sentence(Str::replaceFirst('akaryakıt', $tag->name.' ', strip_tags(strtolower(html_entity_decode($post->intro)))), 1)) !!}</p><a class="btn btn-xs btn-default" href="{{ $post->url }}">{{ trans('global.buttons.read more') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @unset($post)
                {!! $posts->links('news::pagination.default') !!}
            </div>
            <div class="col-md-4">
                @include('news::partials.sidebar', ['share'=>true])
            </div>
        </div>
    </div>
@endsection
