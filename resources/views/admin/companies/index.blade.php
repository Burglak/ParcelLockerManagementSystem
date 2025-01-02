@extends('layouts.admin')

@section('content')
    @include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Firmy</h2>

        <!-- Przycisk dodawania nowej firmy -->
        <a href="{{ route('admin.create-company') }}" class="btn btn-success mb-3">Dodaj Firmę</a>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj firmę">
        </div>

        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>NIP</th>
                        <th>Adres</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody id="companyList">
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->nip }}</td>
                            <td>{{ $company->address }}</td>
                            <td>
                                <a href="{{ route('admin.edit-company', ['id' => $company->id]) }}" class="btn btn-sm btn-primary">Edytuj</a>
                                <form action="{{ route('admin.delete-company', ['id' => $company->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę firmę?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($companies as $company)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $company->name }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $company->id }}</p>
                        <p class="card-text"><strong>NIP:</strong> {{ $company->nip }}</p>
                        <p class="card-text"><strong>Adres:</strong> {{ $company->address }}</p>
                        <div>
                            <a href="{{ route('admin.edit-company', ['id' => $company->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.delete-company', ['id' => $company->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę firmę?')">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Skrypty JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function() {
                var searchText = this.value.trim().toLowerCase();
                var companyList = document.getElementById('companyList');
                var companies = companyList.getElementsByTagName('tr');

                for (var i = 0; i < companies.length; i++) {
                    var company = companies[i];
                    var name = company.getElementsByTagName('td')[1].textContent.toLowerCase();
                    var nip = company.getElementsByTagName('td')[2].textContent.toLowerCase();
                    var address = company.getElementsByTagName('td')[3].textContent.toLowerCase();

                    if (name.indexOf(searchText) > -1 || nip.indexOf(searchText) > -1 || address.indexOf(searchText) > -1) {
                        company.style.display = '';
                    } else {
                        company.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
