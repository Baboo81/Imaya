<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        //Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        //Enregistrement dans la DB
        Contact::create($validated);

        //Redirection avec message de succès
        return redirect()->back()->with('success', 'Merci pour votre message, je vous répondrai bientôt !');
    }
}
