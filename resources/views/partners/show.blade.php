@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Partner Details</h1>

    <div class="mb-3">
        <a href="{{ route('partners.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card">
        <div class="card-header">
            {{ $partner->nume }} {{ $partner->prenume }}
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $partner->descriere }}</p>
            <p><strong>Phone Number:</strong> {{ $partner->nr_tel }}</p>
        </div>
    </div>
</div>
@endsection