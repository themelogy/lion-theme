<div id="map-canvas" style="height:300px; border-top: 1px solid #ebebeb;"></div>
@push('js-inline')
    <script>
        function initMap() {

            var center = {lat: {{ setting('contact::contact-map-lat') }}, lng: {{ setting('contact::contact-map-lng') }} };

            var map = new google.maps.Map(document.getElementById('map-canvas'),{
                center: center,
                zoom: 16
            });

            var infoWindow = new google.maps.InfoWindow({
                content: "{{ setting('theme::company-name') }}"
            });

            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: "{{ setting('theme::company-name') }}",
                icon: "{{ Theme::url('img/logo/marker.svg') }}"
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpvcV4WyemrP7OUfrDuXTkEaazIzwqe1U&callback=initMap&language={{ locale() }}"></script>
@endpush