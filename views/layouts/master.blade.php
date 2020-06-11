<!DOCTYPE HTML>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    @include('partials.metadata')
</head>

<body>

<div class="global-wrap">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</div>

@include('partials.scripts')

</body>

</html>


