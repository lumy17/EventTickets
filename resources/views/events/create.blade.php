@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('events.store') }}" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="titlu" class="form-label">Title:</label>
            <input type="text" id="titlu" name="titlu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Description:</label>
            <textarea id="descriere" name="descriere" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Date:</label>
            <input type="datetime-local" id="data" name="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="locatie" class="form-label">Location:</label>
            <input type="text" id="locatie" name="locatie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact:</label>
            <input type="text" id="contact" name="contact" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nr_max_participanti" class="form-label">Max Participants:</label>
            <input type="number" id="nr_max_participanti" name="nr_max_participanti" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="pret" class="form-label">Pret:</label>
            <input type="number" id="pret" name="pret" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="text" id="photo" name="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection