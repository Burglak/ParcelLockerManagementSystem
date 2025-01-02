<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PaczkomatyDB</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  </style>
</head>
<body>

@include('shared.navbar')

<div class="container-fluid p-0">
  <img src="/images/parcel-locker(3).jpg" class="img-fluid" alt="parcel locker">
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-4">Twoje paczki, nasze paczkomaty</h1>
    <p class="lead">Najszybsza i najwygodniejsza forma wysyłki i odbioru przesyłek.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('parcel-lockers')}}" role="button">Znajdź paczkomat</a>
  </div>
</div>


<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <h2>Godziny nadań</h2>
      <p>Podaj kod pocztowy i sprawdź godziny graniczne nadania przesyłki.</p>
    </div>
    <div class="col-md-4">
      <h2>Sprawdź</h2>
      <p>Wysyłaj wygodnie</p>
      <p>Nadaj paczkę w jednym z tysięcy automatów Paczkomat®DB lub zamów kuriera</p>
    </div>
    <div class="col-md-4">
      <h2>Wysyłam w apce</h2>
      <p>Od 11,99 zł</p>
      <p>Odbieraj i nadawaj bezpiecznie</p>
      <p>Chroń swoje dane z aplikacją PaczkomatDB Mobile! Poznaj nasze zasady bezpieczeństwa w sieci</p>
    </div>
  </div>
</div>
<br>
<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Zwróć paczkę</h5>
          <p class="card-text">Nietrafione zamówienie? Zwróć je wygodnie do sklepu internetowego za pośrednictwem jednego z ponad 19 000 automatów Paczkomat®DB w całej Polsce!</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Allegro PaczkomatDB</h5>
          <p class="card-text">Obniż koszty wysyłki i wprowadź dla swoich klientów opcję darmowego i wygodnego zwrotu dzięki Allegro PaczkomatDB!</p>
        </div>
      </div>
    </div>
  </div>
</div>


@include('shared.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
