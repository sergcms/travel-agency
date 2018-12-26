@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-start">
        <h2>Travel Agencies</h2>
        <a href="{{ route('agency-create') }}" class="btn btn-info text-white">Create agency</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Travel agency</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($agencies as $agency)
                <tr>
                    <td>{{ $agency->id }}</td>
                    <td>{{ $agency->name }}</td>
                    <td>{{ $agency->email }} </td>
                    <td>{{ $agency->phone }} </td>
                    <td>
                        <a href="{{ route('agency-edit', [$agency->id]) }}" class="btn btn-secondary mr-2">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
