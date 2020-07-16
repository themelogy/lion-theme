<div class="page-title">
    <div class="container">
        {{ $slot ?? 'Başlık' }}
    </div>
</div>
@isset($breadcrumbs)
    <div class="breadcrumbs">
        <div class="container">
            {!! Breadcrumbs::renderIfExists($breadcrumbs) !!}
        </div>
    </div>
@endisset

@if(@$image)
<div class="page-cover" style="background: url({{ $image }}) no-repeat center center; background-size: cover; height: 250px;"></div>
@endif
