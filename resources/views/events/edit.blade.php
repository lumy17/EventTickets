@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event: {{ $event->titlu }}</h1>

    <form method="POST" action="{{ route('events.update', $event->id) }}" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titlu" class="form-label">Title:</label>
            <input type="text" id="titlu" name="titlu" class="form-control" value="{{ $event->titlu }}" required>
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Description:</label>
            <textarea id="descriere" name="descriere" class="form-control" required>{{ $event->descriere }}</textarea>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Date:</label>
            <input type="datetime-local" id="data" name="data" class="form-control" value="{{ \Carbon\Carbon::parse($event->data)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="locatie" class="form-label">Location:</label>
            <input type="text" id="locatie" name="locatie" class="form-control" value="{{ $event->locatie }}" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact:</label>
            <input type="text" id="contact" name="contact" class="form-control" value="{{ $event->contact }}" required>
        </div>
        <div class="mb-3">
            <label for="nr_max_participanti" class="form-label">Max Participants:</label>
            <input type="number" id="nr_max_participanti" name="nr_max_participanti" class="form-control" value="{{ $event->nr_max_participanti }}" required>
        </div>
        <div class="mb-3">
            <label for="pret" class="form-label">Pret:</label>
            <input type="number" id="pret" name="pret" class="form-control" value="{{ $event->tickets->first()->pret }}" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="text" id="photo" name="photo" class="form-control" value="{{ $event->photo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection