@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        View Sponsor
    </div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('sponsors.index', ['event' => $event]) }}">Back</a>
        </div>
        <div class="form-group">
            <strong>Name: </strong> {{ $sponsor->nume }}
        </div>
        <div class="form-group">
            <strong>Last Name: </strong> {{ $sponsor->prenume }}
        </div>
        <div class="form-group">
            <strong>Description: </strong> {{ $sponsor->descriere }}
        </div>
        <div class="form-group">
            <strong>Phone Number: </strong> {{ $sponsor->nr_tel }}
        </div>
        <div class="form-group">
            <strong>Amount: </strong> {{ $sponsor->suma }}
        </div>
    </div>
</div>
@endsection