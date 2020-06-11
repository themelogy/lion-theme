@extends('layouts.master')

@section('content')
    @themeSlide('anasayfa')
    @pageFindByOptions('settings.show_page_home', 'home')
    @pageFindByOptions('settings.show_services', 'services')
    @newsLatestPosts(10, 'latest')
@endsection
