@extends('blog::layouts.master')

@section('blog content')
    @component('partials.components.title', ['breadcrumbs'=>'news'])
        <h1 class="title">{{ trans('themes::news.title') }}</h1>
    @endcomponent
    <div class="container mt30">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts->chunk(2) as $chunk)
                    <div class="row">
                    @foreach($chunk as $post)
                        <div class="col-md-6">
                        @include('news::partials._post')
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
