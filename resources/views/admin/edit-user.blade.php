<!-- resources/views/admin/users/edit.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Edytuj użytkownika</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.update-user', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Imię:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="surname">Nazwisko:</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ $user->surname }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Numer telefonu:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}">
            </div>

            <div class="form-group">
                <label for="type">Typ użytkownika:</label>
                <select name="type" id="type" class="form-control">
                    <option value="user" {{ $user->type === 'user' ? 'selected' : '' }}>Użytkownik</option>
                    <option value="admin" {{ $user->type === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="courier" {{ $user->type === 'courier' ? 'selected' : '' }}>Kurier</option>
                </select>
            </div>

            <div class="form-group">
                <label for="company_id">ID Firmy:</label>
                <input type="text" name="company_id" id="company_id" class="form-control" value="{{ $user->company_id }}">
            </div>

            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
    </div>
@endsection
