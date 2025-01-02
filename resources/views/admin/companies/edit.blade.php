<!-- resources/views/admin/companies/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj Firmę</h2>
        <form method="POST" action="{{ route('admin.update-company', ['id' => $company->id]) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ $company->nip }}" required>
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
@endsection
