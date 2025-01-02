<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nadaj paczkę</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('shared.navbar')

<div class="container mt-4">
    <h2 class="text-center mb-4">Nadaj paczkę</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('send') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="recipient_number">Numer odbiorcy:</label>
            <input type="text" name="recipient_number" id="recipient_number" class="form-control" required required pattern="[0-9]{9}" title="Numer odbiorcy musi składać się z 9 cyfr.">
        </div>

        <div class="form-group">
            <label for="start_locker_id">Paczkomat początkowy:</label>
            <select name="start_locker_id" id="start_locker_id" class="form-control" required>
                @foreach($lockers as $locker)
                    <option value="{{ $locker->id }}">{{ $locker->address }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="end_locker_id">Paczkomat końcowy:</label>
            <select name="end_locker_id" id="end_locker_id" class="form-control" required>
                @foreach($lockers as $locker)
                    <option value="{{ $locker->id }}">{{ $locker->address }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="parcel_name">Nazwa paczki:</label>
            <input type="text" name="parcel_name" id="parcel_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="parcel_description">Opis paczki:</label>
            <textarea name="parcel_description" id="parcel_description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="parcel_type_id">Typ paczki:</label>
            <select name="parcel_type_id" id="parcel_type_id" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}    {{ $type->dimensions }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Nadaj paczkę</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
