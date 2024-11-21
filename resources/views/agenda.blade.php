<!DOCTYPE html>
<html>
<head>
    <title>Agenda Eveniment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/agenda.css') }}">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if($agendas->count() > 0)
            <h1>Agenda Eveniment</h1>
            @foreach($agendas as $agenda)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $agenda->titlu }}</h5>
                        <p class="card-text">{{ $agenda->descriere }}</p>
                    </div>
                </div>
            @endforeach
            <a href="/event/{{ $agenda->id_eveniment }}/speakers" class="btn btn-primary">Vezi speakerii</a>
        @else
            <p>Nu există informații despre agenda evenimentului!</p>
        @endif
    </div>
</body>
</html>
