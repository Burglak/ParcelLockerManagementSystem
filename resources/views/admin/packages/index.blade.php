@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Paczki</h2>
        <a href="{{ route('admin.create-package') }}" class="btn btn-success mb-3">Dodaj Paczkę</a>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj paczkę">
        </div>

        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nadawca</th>
                        <th>Odbiorca</th>
                        <th>Kurier</th>
                        <th>Paczkomat początkowy</th>
                        <th>Paczkomat końcowy</th>
                        <th>Nazwa</th>
                        <th>Kod</th>
                        <th>Opis</th>
                        <th>Status</th>
                        <th>Typ</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="packageList">
                    @foreach($packages as $package)
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->sender->name }}</td>
                            <td>{{ $package->receiver->name }}</td>
                            <td>{{ $package->courier->id }}</td>
                            <td>{{ $package->startLocker->address }}</td>
                            <td>{{ $package->endLocker->address }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->code }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->status->name }}</td>
                            <td>{{ $package->type->name }}</td>
                            <td>
                                <a href="{{ route('admin.edit-package', ['id' => $package->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-package', ['id' => $package->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę paczkę?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($packages as $package)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Paczka ID: {{ $package->id }}</h5>
                        <p class="card-text"><strong>Nadawca:</strong> {{ $package->sender->name }}</p>
                        <p class="card-text"><strong>Odbiorca:</strong> {{ $package->receiver->name }}</p>
                        <p class="card-text"><strong>Kurier:</strong> {{ $package->courier->id }}</p>
                        <p class="card-text"><strong>Paczkomat początkowy:</strong> {{ $package->startLocker->address }}</p>
                        <p class="card-text"><strong>Paczkomat końcowy:</strong> {{ $package->endLocker->address }}</p>
                        <p class="card-text"><strong>Nazwa:</strong> {{ $package->name }}</p>
                        <p class="card-text"><strong>Kod:</strong> {{ $package->code }}</p>
                        <p class="card-text"><strong>Opis:</strong> {{ $package->description }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $package->status->name }}</p>
                        <p class="card-text"><strong>Typ:</strong> {{ $package->type->name }}</p>
                        <div>
                            <a href="{{ route('admin.edit-package', ['id' => $package->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-package', ['id' => $package->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę paczkę?')">Usuń</button>
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
                var packageList = document.getElementById('packageList');
                var packages = packageList.getElementsByTagName('tr');

                for (var i = 0; i < packages.length; i++) {
                    var senderCell = packages[i].getElementsByTagName('td')[1];
                    var receiverCell = packages[i].getElementsByTagName('td')[2];
                    var startLockerCell = packages[i].getElementsByTagName('td')[4];
                    var endLockerCell = packages[i].getElementsByTagName('td')[5];
                    var nameCell = packages[i].getElementsByTagName('td')[6];

                    if (senderCell && receiverCell && startLockerCell && endLockerCell && nameCell) {
                        var senderName = senderCell.textContent || senderCell.innerText;
                        var receiverName = receiverCell.textContent || receiverCell.innerText;
                        var startLockerAddress = startLockerCell.textContent || startLockerCell.innerText;
                        var endLockerAddress = endLockerCell.textContent || endLockerCell.innerText;
                        var packageName = nameCell.textContent || nameCell.innerText;

                        if (senderName.toLowerCase().indexOf(searchText) > -1 || receiverName.toLowerCase().indexOf(searchText) > -1 || startLockerAddress.toLowerCase().indexOf(searchText) > -1 || endLockerAddress.toLowerCase().indexOf(searchText) > -1 || packageName.toLowerCase().indexOf(searchText) > -1) {
                            packages[i].style.display = '';
                        } else {
                            packages[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
