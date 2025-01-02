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
  <img src="/images/city.jpg" class="img-fluid" alt="parcel locker">
</div>

<br>
<br>

<section class="container mb-5">
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Zwiększ efektywność</h5>
          <p class="card-text">Optymalizuj proces wysyłki paczek w Twojej firmie, oszczędzając czas i pieniądze. Korzystając z naszej sieci paczkomatów, możesz uniknąć długich kolejek w placówkach pocztowych i zaoszczędzić cenny czas swoich pracowników.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Bezpieczne przesyłki</h5>
          <p class="card-text">Gwarantujemy bezpieczeństwo Twoich paczek dzięki naszym zaawansowanym systemom logistycznym. Każda paczka jest monitorowana i zabezpieczona, aby dotarła do celu w nienaruszonym stanie.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Dostosowane rozwiązania</h5>
          <p class="card-text">Oferujemy elastyczne opcje wysyłki, dopasowane do potrzeb Twojej firmy. Bez względu na rozmiar paczki czy ilość przesyłek, nasza sieć paczkomatów zapewni Ci szybką i wygodną wysyłkę.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mb-5">
  <h2 class="text-center mb-4">Nasza oferta dla firm</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Rozwiązania logistyczne na miarę Twojej firmy</h5>
          <p class="card-text">Z naszymi usługami logistycznymi możesz zoptymalizować procesy wysyłki i odbioru paczek, niezależnie od wielkości Twojej firmy.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Rabaty i promocje dla firm partnerskich</h5>
          <p class="card-text">Dołącz do naszej sieci firm partnerskich i korzystaj z atrakcyjnych rabatów oraz promocji dostępnych tylko dla Ciebie.</p>
        </div>
      </div>
    </div>
  </div>
</section>


@include('shared.footer')
