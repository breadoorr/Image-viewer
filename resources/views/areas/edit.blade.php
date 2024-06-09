@extends('layouts.app')

@section('content')
    <h1>Edit Area</h1>
    <form action="{{ route('areas.update', $area->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $area->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
