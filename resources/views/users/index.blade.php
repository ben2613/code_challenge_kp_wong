@extends('layouts.center')

@push('child-scripts')
<script src="{{ asset('js/users.js') }}" defer></script>
@endpush
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
                <button
                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                    data-username="{{$u->name}}"
                    data-href="{{ route('users.destroy', ['user' => $u->id]) }}"
                    class="btn btn-danger users-delete"
                    role="button">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Deleting user</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete user <span class="modal-username"></span>?
        </div>
        <div class="modal-footer">
            <button onclick="usersConfirmDelete();" type="button" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Result</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body return-message">
        </div>
      </div>
    </div>
</div>
@endsection
