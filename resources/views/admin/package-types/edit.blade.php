<!-- resources/views/admin/package-types/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj typ paczki</h2>
        <form action="{{ route('admin.update-package-type', ['id' => $packageType->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $packageType->name }}" required>
            </div>

            <div class="form-group">
                <label for="price">Cena:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $packageType->price }}" required>
            </div>

            <div class="form-group">
                <label for="weight">Waga:</label>
                <input type="text" name="weight" id="weight" class="form-control" value="{{ $packageType->weight }}" required>
            </div>

            <div class="form-group">
                <label for="dimensions">Wymiary:</label>
                <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ $packageType->dimensions }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
