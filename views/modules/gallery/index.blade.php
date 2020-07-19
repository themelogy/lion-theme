@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'gallery.index'])
        <h1 class="title">@lang('themes::gallery.meta.title')</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <div class="row" id="popup-gallery">
                @foreach($files as $file)
                <div class="col-md-3">
                    <a class="hover-img popup-gallery-image" href="{{ \Imagy::getImage($file->filename, 'albumImage', ['width' => null, 'height' => 600, 'mode' => 'resize', 'quality' => 80]) }}" data-effect="mfp-zoom-out">
                        <img class="img-responsive" src="{{ \Imagy::getImage($file->filename, 'albumImage', ['width' => 800, 'height' => 600, 'mode' => 'fit', 'quality' => 80]) }}" alt="Image Alternative text" title="Old No7" /><i class="fa fa-expand round box-icon-small hover-icon i round"></i>
                    </a>
                </div>
                @endforeach
            </div>
            {!! $files->links('partials.pagination') !!}
        </div>
    </div>
@stop
