<?php
// app/Http/Controllers/PartnerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\PartnerEvent;
use App\Models\Event;

class PartnerController extends Controller
{
    public function __construct()
    {
        // Middleware-ul 'admin' este aplicat doar pentru acțiunile specificate
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        $events = Event::all();
        return view('partners.create', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required',
        ]);

        $partner = Partner::create([
            'nume' => $data['nume'],
            'prenume' => $data['prenume'],
            'descriere' => $data['descriere'],
            'nr_tel' => $data['nr_tel'],
        ]);


        return redirect()->route('partners.index')->with('success', 'Partener creat cu succes');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        $events = Event::all();
        return view('partners.edit', compact('partner', 'events'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'descriere' => 'required',
            'nr_tel' => 'required'
        ]);

        $partner = Partner::find($id);

        $partner->update([
            'nume' => $data['nume'],
            'prenume' => $data['prenume'],
            'descriere' => $data['descriere'],
            'nr_tel' => $data['nr_tel'],
        ]);


        return redirect()->route('partners.index')->with('success', 'Partener actualizat cu succes');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->events()->detach(); // Detașăm evenimentele asociate înainte de ștergere
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partener șters cu succes');
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        return view('partners.show', compact('partner'));
    }
}