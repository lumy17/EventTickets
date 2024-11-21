@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Agenda: {{ $agenda->titlu }}</h1>

    <form method="POST" action="{{ route('events.agendas.update', [$event, $agenda]) }}" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titlu" class="form-label">Title:</label>
            <input type="text" id="titlu" name="titlu" value="{{ $agenda->titlu }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descriere" class="form-label">Description:</label>
            <textarea id="descriere" name="descriere" class="form-control" required>{{ $agenda->descriere }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
