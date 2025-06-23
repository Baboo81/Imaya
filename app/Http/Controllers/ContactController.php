<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        //Validation des données
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'firstName' => 'required|string|max:100',
            'tel'       => 'required|string|regex:/^[0-9\\s\\-\\+\\(\\)]+$/',
            'email'     => 'required|email',
            'message'   => 'required|string|max:1000',
        ]);

        //Préparer les données à envoyer ds le mail
        $data = [
            'name' => $validated['name'],
            'firstName' => $validated['firstName'],
            'tel' => $validated['tel'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];

        //Envoyer par email à ma cliente
         Mail::to('magicbaboo@gmail.com')->send(new ContactMessageReceived($data));

        //Enregistrement dans la DB
        Contact::create($validated);

        //Redirection avec message de succès
        return redirect()
            ->to(url()->previous() . '#contact-form')
            ->with('success', 'Merci pour votre message, je vous répondrai bientôt !')
            ->withInput();

    }
}
