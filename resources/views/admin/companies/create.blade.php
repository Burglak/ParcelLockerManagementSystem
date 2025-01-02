<!-- resources/views/admin/companies/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj Firmę</h2>
        <form method="POST" action="{{ route('admin.store-company') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
