@extends('adminlte::page')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Users</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="row mb-2">
        <div class="col-12">
            <div class="btn-block">
                <a class="btn btn-primary" href="{{ route('users.create') }}">Create User</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 card p-3">
                @php
                    $config = [
                        'order' => [[1, 'asc']],
                        'columns' => [null, null, null, null, ['orderable' => false]],
                    ];
                @endphp
                <x-adminlte-datatable id="table1" :heads="['ID', 'Name', 'Email', 'Role', 'Actions']"
                                      striped hoverable bordered :config="$config">
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->value }}</td>
                            <td class="d-flex justify-center">
                                <a href="{{ route('users.edit', $user) }}" title="Edit">
                                    <x-adminlte-button label="Edit" class="bg-primary"/>
                                </a>

                                <form method="POST" action="{{ route('users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')"
                                                       label="Delete" class="bg-danger" type="submit"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>
@endsection
