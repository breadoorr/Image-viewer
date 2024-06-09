@extends('layouts.app')

@section('content')
    <h1>Add Property</h1>
    <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" class="form-control" id="published_date" name="published_date" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="type_id">Type</label>
            <select class="form-control" id="type_id" name="type_id" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="area_id">Area</label>
            <select class="form-control" id="area_id" name="area_id" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="primary_photo">Primary Photo</label>
            <input type="file" class="form-control" id="primary_photo" name="primary_photo">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
