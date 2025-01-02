<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista paczkomatów</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
  <h2 class="text-center mb-4">Lista paczkomatów</h2>

  <!-- Wyszukiwarka -->
  <div class="input-group mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj paczkomat">
  </div>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <ul class="list-group" id="parcelLockerList">
        @foreach($parcel_lockers as $parcel_locker)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <a href="{{ route('send') }}">
            </span>
            <span class="locker-address"><i class="fas fa-map-marker-alt"></i> {{ $parcel_locker->address }}</span>
            </a>
          </li>
        @endforeach
      </ul>
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
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput');
    var parcelLockerList = document.getElementById('parcelLockerList');
    var originalList = parcelLockerList.innerHTML.trim();

    searchInput.addEventListener('input', function() {
      var searchText = this.value.trim().toLowerCase();
      var filteredList = '';

      @foreach($parcel_lockers as $parcel_locker)
        if ("{{ $parcel_locker->address }}" .toLowerCase().includes(searchText)) {
          filteredList += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><a href="{{ route('send') }}"></span>
                            <span class="locker-address"><i class="fas fa-map-marker-alt"></i> {{ $parcel_locker->address }}</span>
                            </a>
                          </li>`;
        }
      @endforeach

      if (filteredList === '') {
        parcelLockerList.innerHTML = '<li class="list-group-item text-muted">Brak paczkomatów pasujących do wyszukiwania.</li>';
      } else {
        parcelLockerList.innerHTML = filteredList;
      }
    });

    searchInput.addEventListener('keyup', function(event) {
      if (event.key === 'Escape') {
        this.value = '';
        parcelLockerList.innerHTML = originalList;
      }
    });
  });
</script>

</body>
</html>
