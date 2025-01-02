<!-- resources/views/admin/cities/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nowe miasto</h2>
        <form method="POST" action="{{ route('admin.store-city') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="zip_code">Kod pocztowy:</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
