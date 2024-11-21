<?php

namespace App\Http\Controllers;

use App\Models\User; // Asigură-te că ai importat modelul necesar pentru lucrul cu utilizatorii
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function usersList()
    {
        
        $users = User::all(); 
        return view('list', ['users' => $users]);
    }

    public function manageContent()
    {
        
        return view('manage');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id); 
        return view('edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        
        $user = User::findOrFail($id); 
        $user->update($request->all());

        return redirect()->route('list')->with('success', 'Utilizatorul a fost actualizat cu succes!');
    }

}
