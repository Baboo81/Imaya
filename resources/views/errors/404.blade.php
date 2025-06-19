@extends(('layouts.app'))

@section('title', 'Page non trouvée')

@section('content')

<div class="container text-center py-5">
    <h1 class="display-1 text-danger">404</h1>
    <h2 class="mb-4">Oups... Page introuvable</h2>
    <p class="lead mb-4">La page que vous cherchez n'existe pas ou a été déplacée.</p>
    
    <a href="{{ url('/') }}" class="btn btn-primary">
        Retour à l'accueil
    </a>

    <div class="mt-5">
        <img src="{{ asset('assets/img/error/error404.svg') }}" alt="Erreur 404" class="img-fluid" style="max-width: 400px;">
    </div>
</div>

@endsection