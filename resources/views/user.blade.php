@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-start">
        <h2>Users</h2>
        @if (auth()->user()->role->name == 'admin')
            <a href="{{ route('user-create') }}" class="btn btn-info text-white">Create user</a>
        @endif
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Blocked</th>
                <th>Travel agency ID</th>
                @if (auth()->user()->role->name == 'admin')
                    <th>Controls</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->role }} </td>
                    <td>{{ $user->block == 0 ? '-' : 'blocked' }}</td>
                    <td>{{ $user->travel_agency_id }} </td>
                    @if (auth()->user()->role->name == 'admin')
                        <td>
                            <a href="{{ route('user-edit', [$user->id]) }}" class="btn btn-secondary mr-2">Edit</a>
                            {{-- <a href="{{ route('user-delete', [$user->id]) }}" class="btn btn-danger" onclick='return confirm("Are you sure you want to delete?")'>Delete</a> --}}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
