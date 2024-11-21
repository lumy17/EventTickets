@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Sponsors for Event: {{ $event->titlu }}</h1>

            @foreach ($sponsors as $sponsor)
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $sponsor->nume }} {{ $sponsor->prenume }}</h2>
                        <p class="card-text">{{ $sponsor->descriere }}</p>
                        <p class="card-text">Phone: {{ $sponsor->nr_tel }}</p>
                        <p class="card-text">Sum: {{ $sponsor->suma }}</p>
                        <a href="{{ route('events.sponsors.edit', [$event, $sponsor]) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('events.sponsors.destroy', [$event, $sponsor]) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('events.sponsors.create', $event) }}" class="btn btn-success">Create New Sponsor</a>
        </div>
    </div>
</div>
@endsection
