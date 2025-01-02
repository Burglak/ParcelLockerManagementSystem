<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Paczki</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">Paczki do dostarczenia</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($parcels->isEmpty())
        <p class="text-center">Brak paczek przypisanych do Ciebie.</p>
    @else
        <form action="{{ route('courier.updateParcels') }}" method="POST">
            @csrf
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Paczki</th>
                            <th>Nazwa</th>
                            <th>Opis</th>
                            <th>Status</th>
                            <th>Paczkomat początkowy</th>
                            <th>Paczkomat końcowy</th>
                            <th>Data utworzenia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parcels as $parcel)
                            <tr>
                                <td>{{ $parcel->id }}</td>
                                <td>{{ $parcel->name }}</td>
                                <td>{{ $parcel->description }}</td>
                                <td>
                                    <select name="statuses[{{ $parcel->id }}]" class="form-control">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $parcel->status_id == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{ $parcel->startLocker->address }}</td>
                                <td>{{ $parcel->endLocker->address }}</td>
                                <td>{{ $parcel->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
