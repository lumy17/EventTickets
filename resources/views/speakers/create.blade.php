@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Add New Speaker for Event: {{ $event->titlu }} - Agenda: {{ $agenda->titlu }}
    </div>
    <div class="panel-body">
        <form action="{{ route('speakers.store', ['event' => $event, 'agenda' => $agenda]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nume">Name</label>
                <input type="text" name="nume" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descriere">Description</label>
                <textarea name="descriere" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="nr_tel">Phone Number</label>
                <input type="text" name="nr_tel" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Speaker" class="btn btn-info">
                <a href="{{ route('speakers.index', ['event' => $event, 'agenda' => $agenda]) }}" class="btn btndefault">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
