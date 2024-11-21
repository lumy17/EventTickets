@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Partners</h1>

    <!-- Add this line for the Create button -->
    <a href="{{ route('partners.create') }}" class="btn btn-success mb-2">Create New</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $partner->nume }} {{ $partner->prenume }}</td>
                    <td>{{ $partner->descriere }}</td>
                    <td>{{ $partner->nr_tel }}</td>
                    <td>
                        <a href="{{ route('partners.show', $partner) }}" class="btn btn-info">View</a>
                        <a href="{{ route('partners.edit', $partner) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('partners.destroy', $partner) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
