@extends('layouts.app')

@section('title')
    Tambah Data Spasial
@endsection

@section('content')
    <div class="page-content mt-5">
        <div class="container">
            <div id="map"></div>
            <form action="{{ route('peta.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mapform m-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Label" id="label" name="label"
                            value="{{ old('label') }}">
                        <label for="label">Label</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Kab/Kota" id="kab" name="kab"
                            value="{{ old('kab') }}">
                        <label for="kab">Kab/Kota</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="provinsi" id="provinsi" name="provinsi"
                            value="{{ old('provinsi') }}">
                        <label for="provinsi">Provinsi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="latitude" id="lat" name="latitude"
                            value="{{ old('lat') }}">
                        <label for="lat">Latitude</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="longtitude" id="lng" name="longitude"
                            value="{{ old('lng') }}">
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
