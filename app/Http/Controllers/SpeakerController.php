<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Agenda;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index(Event $event, Agenda $agenda)
    {
        $speakers = $agenda->speakers;
        return view('speakers.index', compact('event', 'agenda', 'speakers'));
    }

    public function create(Event $event, Agenda $agenda)
    {
        return view('speakers.create', compact('event', 'agenda'));
    }

    public function store(Request $request, Event $event, Agenda $agenda)
    {
        $data = $request->validate([
            'nume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required',
        ]);

        $speaker = Speaker::create($data);
        $agenda->speakers()->attach($speaker->id);

        return redirect()->route('speakers.index', ['event' => $event, 'agenda' => $agenda]);
    }

    public function edit(Event $event, Agenda $agenda, Speaker $speaker)
    {
        return view('speakers.edit', compact('event', 'agenda', 'speaker'));
    }

    public function update(Request $request, Event $event, Agenda $agenda, Speaker $speaker)
    {
        $data = $request->validate([
            'nume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required',
        ]);

        $speaker->update($data);

        return redirect()->route('speakers.index', ['event' => $event, 'agenda' => $agenda]);
    }

    public function destroy(Event $event, Agenda $agenda, Speaker $speaker)
    {
        $speaker->delete();

        return redirect()->route('speakers.index', ['event' => $event, 'agenda' => $agenda]);
    }
}
