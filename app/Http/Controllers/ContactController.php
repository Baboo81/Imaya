<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        //Honeypot
        if ($request->filled('website')) {
            Log::warning('Honeypot déclenché par IP : ' . $request->ip());
            abort(403, 'Bot détecté !');
        }

        //Rate limiting
        $ip = $request->ip();
        $key = 'contact-form:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            Log::warning("Trop de tentatives depuis l'IP : $ip");
            abort(429, 'Trop de tentatives ! Veuillez réessayer plus tard !');
        }

        RateLimiter::hit($key, 60);//vérouillé pdt 60sec après 5 tentavives


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

        //Récupération de la langue active depuis la session ('locale')
        $lang = session('locale', 'fr');

        //Charger dynamiquement le fichier de langue
        $data = include resource_path("lang/{$lang}/onepageData.php");

        $successMessage = $data['contact']['success'] ?? '<i class="bi bi-check-circle-fill text-success"></i>';
        

        //Redirection avec message de succès
        return redirect(url()->previous() . '#contact-form')
            ->with('success', $successMessage);

       

    }
}
