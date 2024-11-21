<!DOCTYPE html>
<html>
<head>
    <title>Speakeri Eveniment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/speaker.css') }}">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if(count($speakers) > 0)
            <h1>Speakeri Eveniment</h1>
            @foreach($speakers as $speaker)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $speaker->nume }}</h5>
                        <p class="card-text">{{ $speaker->descriere }}</p>
                        <p class="card-text">{{ $speaker->nr_tel }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nu există informații despre speakerii evenimentului!</p>
        @endif
    </div>
</body>
</html>
