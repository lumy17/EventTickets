<?php

// app/Http/Controllers/EventController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class EventController extends Controller
{
    public function __construct()
    {
        // Middleware-ul 'admin' este aplicat doar pentru acțiunile specificate
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'data' => 'required|date',
            'locatie' => 'required',
            'contact' => 'required',
            'nr_max_participanti' => 'required|integer',
            'photo' => 'required',
            'pret' => 'required|numeric', // Add validation for 'pret'
        ]);
    
        // Create the event
        $event = Event::create($data);
    
        // Create the ticket
        $ticket = new Ticket;
        $ticket->pret = $request->pret;
        $ticket->status = 'Available'; // Set the default status
        // Set any other default values...
    
        // Associate the ticket with the event
        $event->tickets()->save($ticket);
    
        return redirect()->route('events.index')->with('success', 'Eveniment creat cu succes');
    }
    

    public function edit($id)
{
    $event = Event::find($id);
    return view('events.edit', compact('event'));
}

public function destroy($id)
{
    $event = Event::find($id);
    $event->delete();

    return redirect()->route('events.index')->with('success', 'Eveniment șters cu succes');
}
    public function show($id)
{
    $event = Event::find($id);
    return view('events.show', compact('event'));
}
public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $data = $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'data' => 'required|date',
            'locatie' => 'required',
            'contact' => 'required',
            'nr_max_participanti' => 'required|integer',
        ]);

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Eveniment actualizat cu succes');
    }
}
