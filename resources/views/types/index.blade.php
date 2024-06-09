@extends('layouts.app')

@section('content')
    <h1>Types</h1>
    <a href="{{ route('types.create') }}" class="btn btn-primary">Add Type</a>
    <table class="table table-striped mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display:inline;">
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
