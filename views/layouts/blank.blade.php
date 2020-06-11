<!DOCTYPE HTML>
<html class="full" lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
{!! seo_helper()->render() !!}

<!-- /GOOGLE FONTS -->
    {!! Theme::style('css/bootstrap.css') !!}
    {!! Theme::style('css/font-awesome.css') !!}
    {!! Theme::style('css/icomoon.css') !!}
    {!! Theme::style('css/styles.css') !!}
    {!! Theme::style('css/mystyles.css') !!}
    {!! Theme::script('js/modernizr.js') !!}
</head>

<body class="full">

<div class="global-wrap">
    @yield('content')
</div>

</body>
</html>


