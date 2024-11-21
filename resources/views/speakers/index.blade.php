@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Speakers for Event: {{ $event->titlu }} - Agenda: {{ $agenda->titlu }}
    </div>
    <div class="panel-body">
        <a href="{{ route('speakers.create', ['event' => $event, 'agenda' => $agenda]) }}" class="btn btn-default">Add New Speaker</a>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            @foreach ($speakers as $speaker)
            <tr>
                <td>{{ $speaker->nume }}</td>
                <td>{{ $speaker->descriere }}</td>
                <td>{{ $speaker->nr_tel }}</td>
                <td>
                    <a href="{{ route('speakers.edit', ['event' => $event, 'agenda' => $agenda, 'speaker' => $speaker]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('speakers.destroy', ['event' => $event, 'agenda' => $agenda, 'speaker' => $speaker]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
