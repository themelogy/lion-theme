<noscript id="deferred-styles">
@stack('css-stack')
{!! Asset::css() !!}
</noscript>

@stack('css-inline')

<script src="{{ mix('/themes/lion/js/jquery.min.js') }}"></script>
<script src="{{ mix('/themes/lion/js/vendor.min.js') }}"></script>
<script src="{{ mix('/themes/lion/js/owl-carousel.min.js') }}"></script>

{!! Asset::js() !!}
@stack('js-stack')

<script src="{{ mix('/themes/lion/js/custom.min.js') }}"></script>

@stack('js-inline')
@include('core::cookie-law')

{{-- @includeIf('partials.analytics') --}}
