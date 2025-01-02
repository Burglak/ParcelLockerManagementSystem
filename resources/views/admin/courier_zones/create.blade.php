<!-- resources/views/admin/courier_zones/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nową strefę kurierską</h2>
        <form action="{{ route('admin.store-courier-zone') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="city_id">Miasto:</label>
                <select name="city_id" id="city_id" class="form-control">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
