<!-- resources/views/admin/transactions/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Transakcje</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa Klienta</th>
                    <th>Kwota</th>
                    <!-- Dodaj więcej kolumn, jeśli to konieczne -->
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->customer_name }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <!-- Dodaj więcej kolumn, jeśli to konieczne -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
