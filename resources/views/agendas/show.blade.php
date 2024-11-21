<!-- resources/views/events/show.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Eveniment
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Titlu: </strong> {{ $event->title }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $event->description }}
            </div>
            <!-- Alte câmpuri pentru eveniment -->
        </div>
    </div>
@endsection