<noscript id="deferred-styles">
@stack('css-stack')
{!! Asset::css() !!}
</noscript>

@stack('css-inline')

{!! Theme::script('js/jquery.min.js') !!}
{!! Theme::script('js/vendor.min.js') !!}
{!! Theme::script('js/owl-carousel.js') !!}

{!! Asset::js() !!}
@stack('js-stack')

@if(env('APP_ENV')=='local')
    {!! Theme::script('js/custom.js') !!}
@else
    {!! Theme::script('js/custom.min.js') !!}
@endif

@stack('js-inline')
@include('core::cookie-law')

{{-- @includeIf('partials.analytics') --}}
