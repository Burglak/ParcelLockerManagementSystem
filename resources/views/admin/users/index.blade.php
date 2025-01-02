@extends('layouts.admin')

@section('content')
    @include('admin.navbar')
    <div class="container">
        <h2 class="my-4">Użytkownicy</h2>

        <!-- Wyszukiwarka -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Wyszukaj użytkownika">
        </div>

        <!-- Tabela dla większych ekranów -->
        <div class="d-none d-md-block table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userList">
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->company ? $user->company->name : 'N/A' }}</td>
                            <td>{{ $user->type }}</td>
                            <td>
                                <a href="{{ route('admin.edit-user', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.delete-user', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Karty dla mniejszych ekranów -->
        <div class="d-md-none">
            @foreach($users as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} {{ $user->surname }}</h5>
                        <p class="card-text"><strong>ID:</strong> {{ $user->id }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                        <p class="card-text"><strong>Company:</strong> {{ $user->company ? $user->company->name : 'N/A' }}</p>
                        <p class="card-text"><strong>Type:</strong> {{ $user->type }}</p>
                        <div>
                            <a href="{{ route('admin.edit-user', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.delete-user', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
                var userList = document.getElementById('userList');
                var users = userList.getElementsByTagName('tr');

                for (var i = 0; i < users.length; i++) {
                    var user = users[i];
                    var name = user.getElementsByTagName('td')[1].textContent.toLowerCase();
                    var surname = user.getElementsByTagName('td')[2].textContent.toLowerCase();
                    var email = user.getElementsByTagName('td')[3].textContent.toLowerCase();
                    var address = user.getElementsByTagName('td')[4].textContent.toLowerCase();
                    var phoneNumber = user.getElementsByTagName('td')[5].textContent.toLowerCase();

                    if (name.indexOf(searchText) > -1 || surname.indexOf(searchText) > -1 || email.indexOf(searchText) > -1 || address.indexOf(searchText) > -1 || phoneNumber.indexOf(searchText) > -1) {
                        user.style.display = '';
                    } else {
                        user.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
