@extends('layouts.app')

@section('title')
    Edit Data Spasial
@endsection

@section('content')
    <div class="page-content mt-5">
        <div class="container">
            <div id="mapedit"></div>
            <form action="{{ route('peta.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mapform m-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Label" id="label" name="label"
                            value="{{ $item->label }}">
                        <label for="label">Label</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Kab/Kota" id="kab" name="kab"
                            value="{{ $item->kab }}">
                        <label for="kab">Kab/Kota</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="provinsi" id="provinsi" name="provinsi"
                            value="{{ $item->provinsi }}">
                        <label for="provinsi">Provinsi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="latitude" id="lat" name="latitude"
                            value="{{ $item->latitude }}">
                        <label for="lat">Latitude</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="longtitude" id="lng" name="longitude"
                            value="{{ $item->longitude }}">
                        <label for="lng">Longitude</label>
                    </div>
                    <div class="form-btn">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        function initMap() {
            const myLatlng = {
                lat: {{ $item->latitude }},
                lng: {{ $item->longitude }}
            };

            let map = new google.maps.Map(document.getElementById('mapedit'), {
                center: myLatlng,
                zoom: 7
            })

            const pin = myLatlng;
            let marker = new google.maps.Marker({
                position: pin,
                map: map,
                draggable: true,
                title: "geser atau klik",
            });


            google.maps.event.addListener(marker, "position_changed", function() {
                let lat = marker.position.lat();
                let lng = marker.position.lng();
                $("#lat").val(lat);
                $("#lng").val(lng);
            });

            google.maps.event.addListener(map, "click", function(event) {
                pos = event.latLng;
                marker.setPosition(pos);
            });
        }
    </script>
@endpush
