@foreach($brands->chunk(4) as $chunks)
    <div class="row">
        @foreach($chunks as $brand)
            <div class="col-md-3">
                <div class="thumbnail brand">
                    <a href="{{ $brand->website }}" target="_blank"><img src="{{ $brand->present()->firstImage(null,75,'resize',70) }}" alt="{{ $brand->title }}"/></a>
                    <div class="caption">
                        <h5>{{ $brand->title }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

