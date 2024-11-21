@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Speaker: {{ $speaker->nume }} {{ $speaker->prenume }}</h1>

    <form method="POST" action="{{ route('speakers.update', $speaker) }}" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nume" class="form-label">First Name:</label>
            <input type="text" id="nume" name="nume" value="{{ $speaker->nume }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Description:</label>
            <textarea id="descriere" name="descriere" class="form-control" required>{{ $speaker->descriere }}</textarea>
        </div>
        <div class="mb-3">
            <label for="nr_tel" class="form-label">Phone Number:</label>
            <input type="text" id="nr_tel" name="nr_tel" value="{{ $speaker->nr_tel }}" class="form-control" required>
        </div>    
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection