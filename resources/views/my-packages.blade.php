<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moje paczki</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa; 
    text-align: center; 
    padding: 20px 0; 
    }
  </style>
</head>
<body>

@include('shared.navbar')

<div class="container mt-4">
  <h2 class="text-center mb-4">Moje paczki</h2>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      @if(!is_null($parcels) && !$parcels->isEmpty())
        @foreach($parcels as $parcel)
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{ $parcel->name }}</h5>
              <p class="card-text"><strong>Nadawca:</strong> {{ $parcel->sender->name }}</p>
              <p class="card-text"><strong>Paczkomat:</strong> {{ $parcel->endLocker->address }}</p>
              <p class="card-text"><strong>Status:</strong> {{ $parcel->status->name }}</p>
              <p class="card-text"><strong>Czas wysłania:</strong> {{ $parcel->created_at }}</p>
              <p class="card-text"><strong>Kod odbioru: </strong> {{ $parcel->code }}</p>
            </div>
          </div>
        @endforeach
      @else
        <p>Brak paczek do wyświetlenia.</p>
      @endif
    </div>
  </div>
</div>

<br>
<br>


@include('shared.footer')

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>