<!-- resources/views/admin/packages/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj paczkę</h2>
        <form action="{{ route('admin.update-package', ['id' => $package->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="sender_id">Nadawca:</label>
                <input type="text" name="sender_id" id="sender_id" class="form-control" value="{{ $package->sender_id }}" required>
            </div>

            <div class="form-group">
                <label for="receiver_id">Odbiorca:</label>
                <input type="text" name="receiver_id" id="receiver_id" class="form-control" value="{{ $package->receiver_id }}" required>
            </div>

            <div class="form-group">
                <label for="courier_id">Kurier:</label>
                <input type="text" name="courier_id" id="courier_id" class="form-control" value="{{ $package->courier_id }}" required>
            </div>

            <div class="form-group">
                <label for="start_locker_id">Paczkomat początkowy:</label>
                <input type="text" name="start_locker_id" id="start_locker_id" class="form-control" value="{{ $package->start_locker_id }}" required>
            </div>

            <div class="form-group">
                <label for="end_locker_id">Paczkomat końcowy:</label>
                <input type="text" name="end_locker_id" id="end_locker_id" class="form-control" value="{{ $package->end_locker_id }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $package->name }}" required>
            </div>

            <div class="form-group">
                <label for="code">Kod:</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $package->code }}" required>
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $package->description }}" required>
            </div>

            <div class="form-group">
                <label for="status_id">Status:</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $package->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_id">Typ:</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $package->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
