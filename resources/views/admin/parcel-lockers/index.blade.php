@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2>Paczkomaty</h2>
        <a href="{{ route('admin.create-parcel-locker') }}" class="btn btn-success mb-3">Dodaj nowy paczkomat</a>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj paczkomat">
        </div>
        
        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Miasto</th>
                        <th>Adres</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="parcelLockerList">
                    @foreach($parcelLockers as $parcelLocker)
                        <tr>
                            <td>{{ $parcelLocker->id }}</td>
                            <td>{{ $parcelLocker->city->name }}</td>
                            <td>{{ $parcelLocker->address }}</td>
                            <td>
                                <a href="{{ route('admin.edit-parcel-locker', ['id' => $parcelLocker->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-parcel-locker', ['id' => $parcelLocker->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten paczkomat?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($parcelLockers as $parcelLocker)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Paczkomat ID: {{ $parcelLocker->id }}</h5>
                        <p class="card-text"><strong>Miasto:</strong> {{ $parcelLocker->city->name }}</p>
                        <p class="card-text"><strong>Adres:</strong> {{ $parcelLocker->address }}</p>
                        <div>
                            <a href="{{ route('admin.edit-parcel-locker', ['id' => $parcelLocker->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-parcel-locker', ['id' => $parcelLocker->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten paczkomat?')">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function() {
                var searchText = this.value.trim().toLowerCase();
                var parcelLockerList = document.getElementById('parcelLockerList');
                var parcelLockers = parcelLockerList.getElementsByTagName('tr');

                for (var i = 0; i < parcelLockers.length; i++) {
                    var cityCell = parcelLockers[i].getElementsByTagName('td')[1];
                    var addressCell = parcelLockers[i].getElementsByTagName('td')[2];

                    if (cityCell && addressCell) {
                        var cityName = cityCell.textContent || cityCell.innerText;
                        var addressName = addressCell.textContent || addressCell.innerText;

                        if (cityName.toLowerCase().indexOf(searchText) > -1 || addressName.toLowerCase().indexOf(searchText) > -1) {
                            parcelLockers[i].style.display = '';
                        } else {
                            parcelLockers[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
