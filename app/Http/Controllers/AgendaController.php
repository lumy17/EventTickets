<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index(Event $event)
    {
        $agendas = $event->agendas;
        return view('agendas.index', compact('event', 'agendas'));
    }

    public function create(Event $event)
    {
        return view('agendas.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
        ]);
        $data['id_eveniment'] = $event->id;
        $agenda = Agenda::create($data);
        $event->agendas()->save($agenda);

        return redirect()->route('events.agendas.index', $event);
    }

    public function edit(Event $event, Agenda $agenda)
    {
        return view('agendas.edit', compact('event', 'agenda'));
    }

    public function update(Request $request, Event $event, Agenda $agenda)
    {
        $data = $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
        ]);

        $agenda->update($data);

        return redirect()->route('events.agendas.index', $event);
    }

    public function destroy(Event $event, Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('events.agendas.index', $event);
    }
}
