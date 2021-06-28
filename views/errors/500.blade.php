@extends('layouts.master')

@php
    seo_helper()->setTitle('500 - Sistem hatası');
@endphp

@section('content')

    @component('partials.components.title')
        <h1 class="title">500 - Sistem Hatası</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">
            <p class="text-hero">500</p>
            <h1>Sistem Hatası.</h1>
            <p>Bir hata oluştu. Bu konuda yönetici bilgilendirildi.</p><a class="btn btn-white btn-ghost btn-lg mt5" href="{!! LaravelLocalization::getLocalizedURL(locale(), route('homepage')) !!}"><i class="fa fa-long-arrow-left"></i> Anasayfa'ya dön</a>
        </div>
    </div>
@endsection