<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sponsor;


class SponsorController extends Controller
{
    public function __construct()
    {
        // Middleware-ul 'admin' este aplicat doar pentru acțiunile specificate
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index(Event $event)
    {
        $sponsors = $event->sponsors;
        return view('sponsors.index', compact('event', 'sponsors'));
    }

    public function create(Event $event)
    {
        return view('sponsors.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required',
            'suma' => 'required',
        ]);

        $sponsor = Sponsor::create($data);
        $event->sponsors()->save($sponsor);

        return redirect()->route('events.sponsors', $event);
    }

    public function edit(Event $event, Sponsor $sponsor)
    {
        return view('sponsors.edit', compact('event', 'sponsor'));
    }

    public function update(Request $request, Event $event, Sponsor $sponsor)
    {
        $data = $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required',
            'suma' => 'required',
        ]);

        $sponsor->update($data);

        return redirect()->route('events.sponsors', $event);
    }

    public function destroy(Event $event, Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()->route('events.sponsors', $event);
    }
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.show', compact('sponsor'));
    }
}