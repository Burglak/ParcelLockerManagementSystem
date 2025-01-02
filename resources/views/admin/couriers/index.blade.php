@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Kurierzy</h2>
        <a href="{{ route('admin.create-courier') }}" class="btn btn-success mb-3">Dodaj nowego kuriera</a>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj kuriera">
        </div>

        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Użytkownik</th>
                        <th>Strefa kurierska</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="courierList">
                    @foreach($couriers as $courier)
                        <tr>
                            <td>{{ $courier->id }}</td>
                            <td>{{ $courier->user ? $courier->user->name : 'N/A' }}</td>
                            <td>{{ $courier->courierZone ? $courier->courierZone->description : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.edit-courier', ['id' => $courier->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-courier', ['id' => $courier->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego kuriera?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($couriers as $courier)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $courier->user ? $courier->user->name : 'N/A' }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $courier->id }}</p>
                        <p class="card-text"><strong>Strefa kurierska:</strong> {{ $courier->courierZone ? $courier->courierZone->description : 'N/A' }}</p>
                        <div>
                            <a href="{{ route('admin.edit-courier', ['id' => $courier->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-courier', ['id' => $courier->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego kuriera?')">Usuń</button>
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
                var courierList = document.getElementById('courierList');
                var couriers = courierList.getElementsByTagName('tr');

                for (var i = 0; i < couriers.length; i++) {
                    var userCell = couriers[i].getElementsByTagName('td')[1];
                    if (userCell) {
                        var userName = userCell.textContent || userCell.innerText;
                        if (userName.toLowerCase().indexOf(searchText) > -1) {
                            couriers[i].style.display = '';
                        } else {
                            couriers[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
