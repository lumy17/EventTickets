@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Events</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-success btn-sm mb-3">Adauga un nou Eveniment</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Max Participants</th>
                <th>Pret</th>
                <th>Poza</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->titlu }}</td>
                    <td>{{ $event->descriere }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->data)->format('d/m/Y H:i') }}</td>
                    <td>{{ $event->locatie }}</td>
                    <td>{{ $event->contact }}</td>
                    <td>{{ $event->nr_max_participanti }}</td>
                    <td>{{$event->tickets->first()->pret }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $event->photo }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm mr-1">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>

                        <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('events.sponsors', $event) }}" class="btn btn-secondary btn-sm mr-1">Sponsors</a>
                        <a href="{{ route('partners.index', $event) }}" class="btn btn-secondary btn-sm mr-1">Partners</a>
                        <a href="{{ route('events.agendas.index', $event) }}" class="btn btn-secondary btn-sm">Agenda&Speakers</a>
                        <a href="{{ url('event/'.$event->id) }}" class="btn btn-secondary btn-sm" role="button">Trimite Invitatii</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
