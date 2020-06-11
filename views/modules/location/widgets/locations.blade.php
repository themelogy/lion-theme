<div class="address-list">
    <div data-items="1">
        @foreach($locations as $location)
            <div class="item">
                <address title="{{ $location->name }}">
                    <strong>{{ $location->name }}</strong>
                    {{ $location->present()->address }}<br/>
                    @isset($location->phone1)
                        <abbr title="Telefon">T:</abbr><a href="tel:{{ $location->phone1 }}">{{ $location->phone1 }}</a><br/>
                    @endisset
                    @isset($location->phone2)
                        <abbr title="Telefon">T:</abbr><a href="tel:{{ $location->phone2 }}">{{ $location->phone2 }}</a><br/>
                    @endisset
                    @isset($location->mobile)
                        <abbr title="Mobil">M:</abbr><a href="tel:{{ $location->mobile }}">{{ $location->mobile }}</a>
                    @endisset
                    <div class="mt20 google-map" style="width:100%; height: 150px;" id="map{{ $location->id }}"></div>
                </address>
            </div>
        @endforeach
    </div>
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
