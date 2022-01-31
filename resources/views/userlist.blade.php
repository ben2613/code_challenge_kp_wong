@extends('layouts.center')

@section('center-content')
<a href="{{ route('users.create') }}" class="btn btn-success" role="button"> New User</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <a href="{{ route('users.edit', ['user' => $u->id]) }}"
                    class="btn btn-primary"
                    role="button">
                    Edit
                </a>
                <a data-href="{{ route('users.destroy', ['user' => $u->id]) }}"
                    class="btn btn-danger user-delete"
                    role="button">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
