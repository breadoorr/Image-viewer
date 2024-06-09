@extends('layouts.app')

@section('content')
    <h1>Properties</h1>

    <div class="row mb-3">
        <div class="col-md-1">
    <form action="{{ route('home') }}" method="GET" class="form-inline mb-3">
        <div class="form-group mr-3">
            <label for="type" class="mr-2">Type:</label>
            <select name="type" id="type" class="form-control mr-3">
                <option value="">All Types</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $typeId ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mr-3">
            <label for="area" class="mr-2">Area:</label>
            <select name="area" id="area" class="form-control mr-3">
                <option value="">All Areas</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ $area->id == $areaId ? 'selected' : '' }}>
                        {{ $area->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sort</button>
    </form>
        </div>
    </div>

    <div class="table table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Published Date</th>
            <th>Price</th>
            <th>Type</th>
            <th>Area</th>
            <th>Primary Photo</th>
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
                <td><img src="{{ asset('storage/' . $property->primary_photo) }}" alt="Primary Photo" width="100"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
