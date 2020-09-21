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
<div class="container">
<img src="{{ $image }}" class="img-responsive" />
</div>
@endif


@push('css_inline')
	<style>
		.page-cover {
			background-size: cover; 
			height: 300px; 
			margin-bottom: 10px;
		}
	</style>
@endpush