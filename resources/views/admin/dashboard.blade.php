<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Admina</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .list-group-item {
      background-color: #fff;
      border-color: #dee2e6;
      color: #495057;
    }
    .list-group-item:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Panel Admina</h2>
    <div class="list-group">
        <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">Użytkownicy</a>
        <a href="{{ route('admin.cities') }}" class="list-group-item list-group-item-action">Miasta</a>
        <a href="{{ route('admin.companies') }}" class="list-group-item list-group-item-action">Firmy</a>
        <a href="{{ route('admin.couriers') }}" class="list-group-item list-group-item-action">Kurierzy</a>
        <a href="{{ route('admin.courier-zones') }}" class="list-group-item list-group-item-action">Strefy kurierskie</a>
        <a href="{{ route('admin.packages') }}" class="list-group-item list-group-item-action">Paczki</a>
        <a href="{{ route('admin.parcel-lockers') }}" class="list-group-item list-group-item-action">Paczkomaty</a>
        <a href="{{ route('admin.package-statuses') }}" class="list-group-item list-group-item-action">Statusy paczek</a>
        <a href="{{ route('admin.package-types') }}" class="list-group-item list-group-item-action">Typy paczek</a>
        <!-- <a href="{{ route('admin.transactions') }}" class="list-group-item list-group-item-action">Transakcje</a> -->
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
