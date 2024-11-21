@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Agenda for Event: {{ $event->titlu }}</h1>

    <form method="POST" action="{{ route('events.agendas.store', $event) }}" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="titlu" class="form-label">Title:</label>
            <input type="text" id="titlu" name="titlu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Description:</label>
            <textarea id="descriere" name="descriere" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
