<!-- resources/views/admin/package-statuses/create.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Dodaj nowy status paczki</h2>
        <form action="{{ route('admin.store-package-status') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>
    </div>
@endsection
