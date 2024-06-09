@extends('layouts.app')

@section('content')
    <h1>Edit Type</h1>
    <form action="{{ route('types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
