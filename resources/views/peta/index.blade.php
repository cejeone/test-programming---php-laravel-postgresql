@extends('layouts.app')

@section('title')
    Data Spasial
@endsection

@section('content')
    <div class="page-content mt-5">
        <div class="container">
            <div id="mapin"></div>
            <div class="datatables m-5">
                <div class="header-box">
                    <h6>Data Spasial</h6>
                    <a type="button" class="btn btn-primary" href="{{ route('peta.create') }}"><i
                            class="fi fi-rr-add"></i>
                        Tambah
                    </a>
                </div>
                <div class="box-body table-responsive mt-5">
                    <table class="table scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Kab</th>
                                <th>Provinsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        let datatable = $('#crudTable').DataTable({
            ordering: true,
            searchable: true,

            ajax: {
                url: '{!! url()->current() !!}',
            },

            columns: [{
                    data: 'label',
                    name: 'label',
                },
                {
                    data: 'kab',
                    name: 'kab',
                },
                {
                    data: 'provinsi',
                    name: 'provinsi',
                },
                {
                    data: 'latitude',
                    name: 'latitude',
                },
                {
                    data: 'longitude',
                    name: 'longitude',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    width: '5%',

                    orderable: false,
                    searchable: false,
                    sortable: false
                },
            ]
        });


        function initMap() {
            const myLatlng = {
                lat: -7.5017,
                lng: 111.2578,
            };

            let map = new google.maps.Map(document.getElementById('mapin'), {
                center: myLatlng,
                zoom: 7
            })

            @foreach ($items as $item)
                addMarker({lat: {{ $item->latitude }}, lng: {{ $item->longitude }} });
            @endforeach

            function addMarker(coords) {
                let marker = new google.maps.Marker({
                    @foreach ($items as $item)
                        title: "{{ $item->label }}",
                    @endforeach

                    position: coords,
                    map: map,
                })

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                })


            }
        }
    </script>
@endpush
