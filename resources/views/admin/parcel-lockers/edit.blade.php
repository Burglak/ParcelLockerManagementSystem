<!-- resources/views/admin/parcel-lockers/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj paczkomat</h2>
        <form action="{{ route('admin.update-parcel-locker', ['id' => $parcelLocker->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="city_id">Miasto:</label>
                <select name="city_id" id="city_id" class="form-control" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $parcelLocker->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $parcelLocker->address }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
