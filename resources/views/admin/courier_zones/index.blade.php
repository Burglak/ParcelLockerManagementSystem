@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Strefy kurierskie</h2>
        <a href="{{ route('admin.create-courier-zone') }}" class="btn btn-success mb-3">Dodaj nową strefę kurierską</a>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj strefę kurierską">
        </div>

        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Miasto</th>
                        <th>Opis</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="zoneList">
                    @foreach($courierZones as $zone)
                        <tr>
                            <td>{{ $zone->id }}</td>
                            <td>{{ $zone->city->name }}</td>
                            <td>{{ $zone->description }}</td>
                            <td>
                                <a href="{{ route('admin.edit-courier-zone', ['id' => $zone->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-courier-zone', ['id' => $zone->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę strefę kurierską?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($courierZones as $zone)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $zone->city->name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $zone->id }}</p>
                        <p class="card-text"><strong>Opis:</strong> {{ $zone->description }}</p>
                        <div>
                            <a href="{{ route('admin.edit-courier-zone', ['id' => $zone->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-courier-zone', ['id' => $zone->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę strefę kurierską?')">Usuń</button>
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
                var zoneList = document.getElementById('zoneList');
                var zones = zoneList.getElementsByTagName('tr');

                for (var i = 0; i < zones.length; i++) {
                    var cityCell = zones[i].getElementsByTagName('td')[1];
                    var descriptionCell = zones[i].getElementsByTagName('td')[2];
                    if (cityCell && descriptionCell) {
                        var cityName = cityCell.textContent || cityCell.innerText;
                        var description = descriptionCell.textContent || descriptionCell.innerText;
                        if (cityName.toLowerCase().indexOf(searchText) > -1 || description.toLowerCase().indexOf(searchText) > -1) {
                            zones[i].style.display = '';
                        } else {
                            zones[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
