@extends('layouts.app')

@section('content')
    <h1>Add Type</h1>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
