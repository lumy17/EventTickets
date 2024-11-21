<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class EvenimentController extends Controller
{
    // Metoda pentru afișarea paginii principale cu evenimente
    public function home()
    {
        $events = Event::all();
        return view('home', compact('events'));
    }

    // Metoda pentru afișarea paginii coșului de cumpărături (cart.blade.php)
    public function cart() 
    {
        return view('cart');
    }
    //se preia produsul si se verifica daca acesta exista sau nu
    //apoi verificam daca exista un cos de sesiune
    //daca cosul exista atunci se trateaza articolul ca primul produs 
    //si este introdus impreuna cu cantitatea si pretul.
    //daca cosul este gol se verifica daca produsul exista deja in cos
    //at se mareste cantitatea
    public function addToCart($id)
    {
        $event = Event::find($id);
        if(!$event) {
            abort(404);
        }
               // Luăm primul bilet asociat evenimentului pentru a obține prețul
        $ticket = $event->tickets()->first();
        $cart = session()->get('cart');
        //daca cart este gol se pune primul product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $event->name,
                    "quantity" => 1,
                    "price" => $ticket->pret,
                    "photo" => $event->photo
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Eveniment adaugat cu success in cos!');
        }
        //daca car nu este gol at verificam daca produsul exista pt a incrementa cantitate
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Eveniment adaugat cu success in cos!');
        }
        //daca item nu exista in cos at adaugam la cos cu quantity=1
        $cart[$id] = [
            "name" => $event->name,
            "quantity" => 1,
            "price" => $ticket->pret,
            "photo" => $event->photo
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Eveniment adaugat cu success in cos!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]= $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success','Cos modificat cu success');
        }
    }
    public function remove(Request $request)
    {
        if($request->id)
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produs sters cu success!!');
        }
    }
    public function showSponsorsPartners($id) {
        $event = Event::find($id);
        $partners = $event->partners;
        $sponsors = $event->sponsors;

        return view('sponsors-partners', compact('event', 'partners', 'sponsors'));
    }
    public function showAgenda($id)
{
    $event = Event::find($id);
    $agendas = $event->agendas;

    return view('agenda', ['agendas' => $agendas]);
}
public function showSpeakers($id)
{
    $event = Event::find($id);
    $speakers = [];

    foreach ($event->agendas as $agenda) {
        foreach ($agenda->speakers as $speaker) {
            $speakers[] = $speaker;
        }
    }

    return view('speakers', ['speakers' => $speakers]);
}


}
