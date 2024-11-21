@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Sponsor: {{ $sponsor->nume }} {{ $sponsor->prenume }}</h1>

            <form method="POST" action="{{ route('events.sponsors.update', [$event, $sponsor]) }}" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nume" class="form-label">First Name:</label>
                    <input type="text" id="nume" name="nume" value="{{ $sponsor->nume }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="prenume" class="form-label">Last Name:</label>
                    <input type="text" id="prenume" name="prenume" value="{{ $sponsor->prenume }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="descriere" class="form-label">Description:</label>
                    <textarea id="descriere" name="descriere" class="form-control" required>{{ $sponsor->descriere }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="nr_tel" class="form-label">Phone Number:</label>
                    <input type="text" id="nr_tel" name="nr_tel" value="{{ $sponsor->nr_tel }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="suma" class="form-label">Sum:</label>
                    <input type="number" id="suma" name="suma" value="{{ $sponsor->suma }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
