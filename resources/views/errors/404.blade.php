
@extends(('layouts.app'))

@section('hideFooter', true)
@section('hideNav', true)

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
@endsection

@section('title', 'Page non trouvée')

@section('content')

<div class="container text-center py-5">
    <h1 class="display-1 text-primary">404</h1>
    <h2 class="mb-4">Oups... Page introuvable</h2>
    <p class="lead mb-4">La page que vous cherchez n'existe pas ou a été déplacée.</p>
    
    <a href="{{ url('/') }}" class="btn btn-order btn-lg mt-2 rounded-5 DastinFont">
        Retour à l'accueil
    </a>

    <div class="mt-5">
        <img src="{{ asset('assets/img/error/error404.svg') }}" alt="Erreur 404" class="img-fluid" style="max-width: 800px;">
    </div>
</div>

@endsection