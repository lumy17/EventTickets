<!DOCTYPE html>
<html>
<head>
    <title>Parteneri & Sponsori Eveniment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/parteneriSponsori.css') }}">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if($partners->count() > 0)
            <h1>Parteneri Eveniment</h1>
            @foreach($partners as $partner)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $partner->nume }} {{ $partner->prenume }}</h5>
                        <p class="card-text">{{ $partner->descriere }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nu există informații despre partenerii evenimentului!</p>
        @endif

        @if($sponsors->count() > 0)
            <h1>Sponsori Eveniment</h1>
            @foreach($sponsors as $sponsor)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sponsor->nume }} {{ $sponsor->prenume }}</h5>
                        <p class="card-text">{{ $sponsor->descriere }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nu există informații despre sponsori evenimentului!</p>
        @endif
    </div>
</body>
</html>
