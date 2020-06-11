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