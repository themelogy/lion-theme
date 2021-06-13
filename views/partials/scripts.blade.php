<noscript id="deferred-styles">
@stack('css-stack')
{!! Asset::css() !!}
</noscript>

@stack('css-inline')

{!! Theme::script('js/jquery.min.js') !!}
<script src="{{ mix('/themes/lion/js/vendor.min.js') }}"></script>
{!! Theme::script('js/owl-carousel.js') !!}

{!! Asset::js() !!}
@stack('js-stack')

<script src="{{ mix('/themes/lion/js/custom.min.js') }}"></script>

@stack('js-inline')
@include('core::cookie-law')

{{-- @includeIf('partials.analytics') --}}
