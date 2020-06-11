@php
    $theme = isset($theme) ? $theme : 'minima';
    $layout = 'vendor/jssocials/dist/jssocials-theme-'. $theme .'.css';
@endphp
<div id="share" class="{{ $theme }}"></div>

@push('css-stack')
    {!! Theme::style('vendor/jssocials/dist/jssocials.css') !!}
    {!! Theme::style($layout) !!}
@endpush

@push('js-stack')
    {!! Theme::script('vendor/jssocials/dist/jssocials.min.js', ['defer']) !!}
@endpush

@push('js-inline')
<script async>
    document.addEventListener("DOMContentLoaded", function(event) {
        $(document).ready(function () {
            $("#share").jsSocials({
                shareIn: "popup",
                showLabel: false,
                showCount: "inside",
                shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "whatsapp"]
            });
        });
    });
</script>
@endpush