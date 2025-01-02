<!-- resources/views/admin/couriers/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj kuriera</h2>
        <form action="{{ route('admin.update-courier', ['id' => $courier->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="user_id">Użytkownik:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $courier->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="courier_zone_id">Strefa kurierska:</label>
                <select name="courier_zone_id" id="courier_zone_id" class="form-control" required>
                    @foreach($courierZones as $zone)
                        <option value="{{ $zone->id }}" {{ $courier->courier_zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->description }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
