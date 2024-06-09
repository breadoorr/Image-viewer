@extends('layouts.app')

@section('content')
    <h1>Properties</h1>
        <a href="{{ route('properties.create') }}" class="btn btn-primary">Add Property</a>
        <table class="table table-striped mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Published Date</th>
                <th>Price</th>
                <th>Type</th>
                <th>Area</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->description }}</td>
                    <td>{{ $property->published_date }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->type->name }}</td>
                    <td>{{ $property->area->name }}</td>
                    <td>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
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
