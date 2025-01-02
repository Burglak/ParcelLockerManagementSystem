@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Miasta</h2>

        <a href="{{ route('admin.create-city') }}" class="btn btn-success mb-3">Dodaj nowe miasto</a>

        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj miasto">
        </div>

        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Kod pocztowy</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="cityList">
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->zip_code }}</td>
                            <td>
                                <a href="{{ route('admin.edit-city', ['id' => $city->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-city', ['id' => $city->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć to miasto?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($cities as $city)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $city->name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $city->id }}</p>
                        <p class="card-text"><strong>Kod pocztowy:</strong> {{ $city->zip_code }}</p>
                        <div>
                            <a href="{{ route('admin.edit-city', ['id' => $city->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-city', ['id' => $city->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć to miasto?')">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('admin.create-city') }}" class="btn btn-success">Dodaj nowe miasto</a>
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
                var cityList = document.getElementById('cityList');
                var cities = cityList.getElementsByTagName('tr');

                for (var i = 0; i < cities.length; i++) {
                    var city = cities[i].getElementsByTagName('td')[1];
                    if (city) {
                        var cityName = city.textContent || city.innerText;
                        if (cityName.toLowerCase().indexOf(searchText) > -1) {
                            cities[i].style.display = '';
                        } else {
                            cities[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
