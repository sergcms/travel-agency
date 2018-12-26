@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-start">
        <h2>Tours</h2>
        <div>
            @if (auth()->user()->role->name != 'client')
                <a href="{{ route('tour-create') }}" class="btn btn-info text-white">Create tour</a>
                <a href="{{ route('assign-create') }}" class="btn btn-info text-white">Create assign</a>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>City</th>
                <th>Hotel</th>
                <th>Food</th>
                <th>People</th>
                <th>Price</th>
                <th>Date start</th>
                <th>Date end</th>
                <th>Status</th>
                @if (auth()->user()->role->name != 'client')
                    <th>Client name</th>
                    <th>Controls</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->country }}</td>
                    <td>{{ $tour->city }} </td>
                    <td>{{ $tour->hotel }} </td>
                    <td>{{ $tour->food }} </td>
                    <td>{{ $tour->people }} </td>
                    <td>{{ $tour->price }} </td>
                    <td>{{ $tour->date_start }} </td>
                    <td>{{ $tour->date_end }} </td>
                    <td>{{ $tour->status }} </td>
                    @if (auth()->user()->role->name != 'client')
                        <td>{{ $tour->name }}</td>
                        <td>
                            <a href="{{ route('tour-edit', [$tour->tour_id]) }}" class="btn btn-secondary mr-2">Edit tour</a>
                            <a href="{{ route('assign-edit', [$tour->user_tour_id]) }}" class="btn btn-secondary mr-2">Edit assign</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
