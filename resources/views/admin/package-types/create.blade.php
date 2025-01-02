<!-- resources/views/admin/package-types/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nowy typ paczki</h2>
        <form action="{{ route('admin.store-package-type') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Cena:</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="weight">Waga:</label>
                <input type="text" name="weight" id="weight" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dimensions">Wymiary:</label>
                <input type="text" name="dimensions" id="dimensions" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
