<!-- resources/views/admin/parcel-lockers/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nowy paczkomat</h2>
        <form action="{{ route('admin.store-parcel-locker') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="city_id">Miasto:</label>
                <select name="city_id" id="city_id" class="form-control" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
