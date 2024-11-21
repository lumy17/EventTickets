@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        View Speaker
    </div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('speakers.index')
}}">Back</a>
        </div>
        <div class="form-group">
            <strong>Name: </strong> {{ $speaker->nume }}
        </div>
        <div class="form-group">
            <strong>Description: </strong> {{ $speaker->descriere }}
        </div>
        <div class="form-group">
            <strong>Phone Number: </strong> {{ $speaker->nr_tel }}
        </div>
    </div>
</div>
@endsection
