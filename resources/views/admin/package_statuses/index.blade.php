@extends('layouts.admin')

@section('content')
@include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Statusy Paczek</h2>
        <a href="{{ route('admin.create-package-status') }}" class="btn btn-success mb-3">Dodaj Status</a>
        
        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj status">
        </div>
        
        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="statusList">
                    @foreach($packageStatuses as $packageStatus)
                        <tr>
                            <td>{{ $packageStatus->id }}</td>
                            <td>{{ $packageStatus->name }}</td>
                            <td>
                                <a href="{{ route('admin.edit-package-status', ['id' => $packageStatus->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-package-status', ['id' => $packageStatus->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten status?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($packageStatuses as $packageStatus)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $packageStatus->name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $packageStatus->id }}</p>
                        <div>
                            <a href="{{ route('admin.edit-package-status', ['id' => $packageStatus->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-package-status', ['id' => $packageStatus->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten status?')">Usuń</button>
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
                var statusList = document.getElementById('statusList');
                var statuses = statusList.getElementsByTagName('tr');

                for (var i = 0; i < statuses.length; i++) {
                    var nameCell = statuses[i].getElementsByTagName('td')[1];

                    if (nameCell) {
                        var name = nameCell.textContent || nameCell.innerText;

                        if (name.toLowerCase().indexOf(searchText) > -1) {
                            statuses[i].style.display = '';
                        } else {
                            statuses[i].style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
