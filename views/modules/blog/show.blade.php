@extends('blog::layouts.master')

@section('blog content')
    @component('partials.components.title', ['breadcrumbs'=>'blog.show'])
        <h1 class="title">{{ $post->title }}</h1>
    @endcomponent
    <div class="container mt30">
        <div class="row">
            <div class="col-md-8">
                <div class="article post mb10">
                    <header class="post-header">
                        @if($post->files->count()>1)
                            <div class="fotorama" data-allowfullscreen="true">
                            @foreach($post->present()->images(800,null,'resize','80') as $image)
                            <img class="lazyloader" src="{{ $image }}" alt="{{ $post->title }} {{ $loop->iteration }}" title="{{ $post->title }} {{ $loop->iteration }}" />
                            @endforeach
                            </div>
                            @unset($image)
                        @else
                            <img class="img-responsive lazyloader" src="{{ $post->present()->firstImage(800,null,'resize',80) }}" alt="{{ $post->title }}" title="{{ $post->title }}" />
                        @endif
                    </header>
                    <div class="post-inner pb10">
                        <ul class="post-meta">
                            <li><i class="fa fa-th-large"></i> <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></li>
                            <li><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a></li>
                            <li><i class="fa fa-user"></i> <a href="#">{{ $post->author->fullname }}</a></li>
                        </ul>
                        <div class="post-desciption">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
                @include('partials.components.share', ['theme'=>'plain'])
            </div>
            <div class="col-md-4">
                @include('blog::partials.sidebar')
            </div>
        </div>
    </div>
    <div class="gap"></div>
@endsection