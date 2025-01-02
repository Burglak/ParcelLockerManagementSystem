<!-- resources/views/admin/package-statuses/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj status paczki</h2>
        <form action="{{ route('admin.update-package-status', ['id' => $packageStatus->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $packageStatus->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
