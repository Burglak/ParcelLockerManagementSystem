@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nową paczkę</h2>
        <form action="{{ route('admin.store-package') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="sender_id">Nadawca:</label>
                <input type="text" name="sender_id" id="sender_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="receiver_id">Odbiorca:</label>
                <input type="text" name="receiver_id" id="receiver_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="courier_id">Kurier:</label>
                <select name="courier_id" id="courier_id" class="form-control" required>
                    @foreach($couriers as $courier)
                        <option value="{{ $courier->id }}">{{ $courier->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_locker_id">Paczkomat początkowy:</label>
                <select name="start_locker_id" id="start_locker_id" class="form-control" required>
                    @foreach($parcelLockers as $parcelLocker)
                        <option value="{{ $parcelLocker->id }}">{{ $parcelLocker->address }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="end_locker_id">Paczkomat końcowy:</label>
                <select name="end_locker_id" id="end_locker_id" class="form-control" required>
                    @foreach($parcelLockers as $parcelLocker)
                        <option value="{{ $parcelLocker->id }}">{{ $parcelLocker->address }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="code">Kod:</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status_id">Status:</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_id">Typ:</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
