@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Agendas for Event: {{ $event->titlu }}</h1>

            @foreach ($agendas as $agenda)
                <div class="card mb-3">
                    <div claAss="card-body">
                        <h2 class="card-title">{{ $agenda->titlu }}</h2>
                        <p class="card-text">{{ $agenda->descriere }}</p>
                        <a href="{{ route('events.agendas.edit', [$event, $agenda]) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('events.agendas.destroy', [$event, $agenda]) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('events.agendas.speakers.index', [$event, $agenda]) }}" class="btn btn-secondary">View Speakers</a>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('events.agendas.create', $event) }}" class="btn btn-success">Create New Agenda</a>
        </div>
    </div>
</div>
@endsection
