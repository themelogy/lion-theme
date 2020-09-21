<div class="panel-group" id="accordion">
    @foreach($locations as $location)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}">{{ $location->name }}</a></h4>
        </div>
        <div class="panel-collapse collapse{{ $loop->first ? ' in' : '' }}" id="collapse-{{ $loop->iteration }}">
            <div class="panel-body">
                <div class="item">
                    @if($img = $location->present()->firstImage(800,600,'fit',80))
                        <div class="row">
                            <div class="col-md-4">
                                <div class="picture" style="position: relative;">
                                    <img class="img-responsive img-thumbnail" src="{{ $img }}" alt="{{ $location->name }}" />
                                    @if(\Modules\Location\Entities\Amenity::hasAmenity())
                                    <div class="amenities" style="position: absolute; bottom: 20px; left: 20px;">
                                        @if(is_object($location->settings))
                                            @foreach($location->settings->amenities as $key => $amenity)
                                                <div class="label label-danger"><i class="fa fa-check"></i> {{ $key }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <address title="{{ $location->name }}" class="address">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p>{{ $location->present()->address }}</p>
                                            @if($location->phone1)
                                                <abbr title="Telefon"><i class="fa fa-phone"></i></abbr><a href="tel:{{ $location->phone1 }}">{{ $location->phone1 }}</a><br/>
                                            @endif
                                            @if($location->phone2)
                                                <abbr title="Telefon"><i class="fa fa-phone"></i></abbr><a href="tel:{{ $location->phone2 }}">{{ $location->phone2 }}</a><br/>
                                            @endisset
                                            @if($location->fax)
                                                <abbr title="Faks"><i class="fa fa-fax"></i></abbr><a href="fax:{{ $location->fax }}">{{ $location->fax }}</a>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <a href="https://www.google.com/maps/dir/Current+Location/{{ $location->lat.','.$location->long }}" class="btn btn-default pull-right-lg m-top-10" target="_blank"><i class="fa fa-map-marker"></i> @lang('themes::contact.direction us')</a>
                                        </div>
                                    </div>
                                    <div class="mt20 google-map" style="width:100%; height: 185px;" id="map{{ $location->id }}"></div>
                                </address>
                            </div>
                        </div>
                    @else
                        <address title="{{ $location->name }}" class="address">
                            <div class="row">
                                <div class="col-md-9">
                                    <p>{{ $location->present()->address }}</p>
                                    @if($location->phone1)
                                        <abbr title="Telefon">TEL:</abbr><a href="tel:{{ $location->phone1 }}">{{ $location->phone1 }}</a><br/>
                                    @endif
                                    @if($location->phone2)
                                        <abbr title="Telefon">TEL:</abbr><a href="tel:{{ $location->phone2 }}">{{ $location->phone2 }}</a><br/>
                                    @endisset
                                    @if($location->fax)
                                        <abbr title="Faks">FAKS:</abbr><a href="fax:{{ $location->fax }}">{{ $location->fax }}</a>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="https://www.google.com/maps/dir/Current+Location/{{ $location->lat.','.$location->long }}" class="btn btn-default pull-right-lg m-top-10" target="_blank"><i class="fa fa-map-marker"></i> YOL TARİFİ AL</a>
                                </div>
                            </div>
                            <div class="mt20 google-map" style="width:100%; height: 185px;" id="map{{ $location->id }}"></div>
                        </address>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@push('js-inline')
    <script>
        function initMap() {
                    @foreach($locations as $location)
            var coordinate{{ $location->id }} = {lat: {{ $location->lat }}, lng: {{ $location->long }} };
            var map{{ $location->id }} = new google.maps.Map(document.getElementById('map{{ $location->id }}'), {
                zoom: 15,
                center: coordinate{{ $location->id }}
            });
            var marker{{ $location->id }} = new google.maps.Marker({
                position: coordinate{{ $location->id }},
                map: map{{ $location->id }},
                icon: "{{ Theme::url('img/marker.png') }}"
            });
            @endforeach
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpvcV4WyemrP7OUfrDuXTkEaazIzwqe1U&callback=initMap&language={{ locale() }}"></script>
@endpush
