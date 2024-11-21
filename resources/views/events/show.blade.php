@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->titlu }}</h1>

        <p><strong>Description:</strong> {{ $event->descriere }}</p>
        <p><strong>Date:</strong> {{ $event->data }}</p>
        <p><strong>Location:</strong> {{ $event->locatie }}</p>
        <p><strong>Contact:</strong> {{ $event->contact }}</p>
        <p><strong>Max Participants:</strong> {{ $event->nr_max_participanti }}</p>
        <p><strong>Pret:</strong> {{ $event->tickets->first()->pret }}</p>
        <p><strong>Photo:</strong> {{ $event->photo }}</p>

        <a href="{{ route('events.edit', $event) }}" class="btn btn-primary">Edit</a>

        <form method="POST" action="{{ route('events.destroy', $event) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection