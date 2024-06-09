@extends('layouts.app')

@section('content')
    <h1>Areas</h1>
    <a href="{{ route('areas.create') }}" class="btn btn-primary">Add Area</a>
    <table class="table table-striped mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{ $area->id }}</td>
                <td>{{ $area->name }}</td>
                <td>
                    <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
