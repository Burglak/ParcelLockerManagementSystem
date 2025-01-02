<!-- resources/views/admin/couriers/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nowego kuriera</h2>
        <form action="{{ route('admin.store-courier') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">Użytkownik:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="courier_zone_id">Strefa kurierska:</label>
                <select name="courier_zone_id" id="courier_zone_id" class="form-control" required>
                    @foreach($courierZones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->description }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
