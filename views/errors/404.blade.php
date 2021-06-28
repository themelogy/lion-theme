@extends('layouts.master')

@php
seo_helper()->setTitle('404 - Sayfa bulunamadı');
@endphp

@section('content')

    @component('partials.components.title')
        <h1 class="title">404 - Sayfa Bulunamadı</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <p class="text-hero">400</p>
            <h1>Sayfa bulunamadı.</h1>
            <p>Aramış olduğunuz sayfayı bulamadık.</p><a class="btn btn-white btn-ghost btn-lg mt5" href="{!! LaravelLocalization::getLocalizedURL(locale(), route('homepage')) !!}"><i class="fa fa-long-arrow-left"></i> Anasayfa'ya dön</a>
        </div>
    </div>
@endsection