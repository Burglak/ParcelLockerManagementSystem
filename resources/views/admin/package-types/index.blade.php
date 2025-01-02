@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Typy Paczek</h2>
        <a href="{{ route('admin.create-package-type') }}" class="btn btn-success mb-3">Dodaj nowy typ paczki</a>
        
        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj typ paczki">
        </div>
        
        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Waga</th>
                        <th>Wymiary</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="typeList">
                    @foreach($packageTypes as $packageType)
                        <tr>
                            <td>{{ $packageType->id }}</td>
                            <td>{{ $packageType->name }}</td>
                            <td>{{ $packageType->price }}</td>
                            <td>{{ $packageType->weight }}</td>
                            <td>{{ $packageType->dimensions }}</td>
                            <td>
                                <a href="{{ route('admin.edit-package-type', ['id' => $packageType->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-package-type', ['id' => $packageType->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten typ paczki?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($packageTypes as $packageType)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $packageType->name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $packageType->id }}</p>
                        <p class="card-text"><strong>Cena:</strong> {{ $packageType->price }}</p>
                        <p class="card-text"><strong>Waga:</strong> {{ $packageType->weight }}</p>
                        <p class="card-text"><strong>Wymiary:</strong> {{ $packageType->dimensions }}</p>
                        <div>
                            <a href="{{ route('admin.edit-package-type', ['id' => $packageType->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-package-type', ['id' => $packageType->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten typ paczki?')">Usuń</button>
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
                var typeList = document.getElementById('typeList');
                var types = typeList.getElementsByTagName('tr');

                for (var i = 0; i < types.length; i++) {
                    var nameCell = types[i].getElementsByTagName('td')[1];
                    var priceCell = types[i].getElementsByTagName('td')[2];
                    var weightCell = types[i].getElementsByTagName('td')[3];
                    var dimensionsCell = types[i].getElementsByTagName('td')[4];

                    if (nameCell && priceCell && weightCell && dimensionsCell) {
                        var name = nameCell.textContent || nameCell.innerText;
                        var price = priceCell.textContent || priceCell.innerText;
                        var weight = weightCell.textContent || weightCell.innerText;
                        var dimensions = dimensionsCell.textContent || dimensionsCell.innerText;

                        if (name.toLowerCase().indexOf(searchText) > -1 ||
                            price.toLowerCase().indexOf(searchText) > -1 ||
                            weight.toLowerCase().indexOf(searchText) > -1 ||
                            dimensions.toLowerCase().indexOf(searchText) > -1) {
                            types[i].style.display = '';
                        } else {
                            types[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
