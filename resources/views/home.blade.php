@php
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\EvenimentController;
@endphp

@extends('layoutcos')
@section('title', 'Events')
@section('content')
<head>
<link href="{{ asset('css/style.css') }}" rel="stylesheet"></head>
@include('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container products">
                        <div class="row">
                            @foreach($events as $eveniment)
                                <div class="col-xs-18 col-sm-6 col-md-3">
                                    <div class="thumbnail" style="padding: 15px;">
                                        <div class="div-img">
                                            <img src="{{ $eveniment->photo }}">
                                        </div>
                                        <div class="caption">
                                            <h4 class="details-h">{{ $eveniment->titlu }}</h4>
                                            <p class="details-h">{{ Str::limit(strtolower($eveniment->descriere), 50) }}</p>
                                            <!-- se afiseaza pretul primului bilet (first ret primul el dintr-o colectie)-->
                                            <p><strong>Pret: </strong> {{ $eveniment->tickets->first()->pret }}$</p>
                                            <p class="btn-holder">
                                                <a href="{{ url('add-tocart/'.$eveniment->id) }}" class="btn btn-warning btn-block text-center" role="button">Pune in cos</a>
                                                <a href="{{ url('event/'.$eveniment->id.'/sponsors-partners') }}" class="btn btn-info btn-block text-center" role="button">Parteneri & Sponsori</a>
                                                <a href="{{ url('event/'.$eveniment->id.'/agenda') }}" class="btn btn-primary btn-block text-center" role="button">Agenda</a>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
