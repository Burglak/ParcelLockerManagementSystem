<!-- resources/views/admin/courier_zones/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj strefę kurierską</h2>
        <form action="{{ route('admin.update-courier-zone', ['id' => $zone->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="city_id">Miasto:</label>
                <select name="city_id" id="city_id" class="form-control">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $zone->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <textarea name="description" id="description" class="form-control">{{ $zone->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
