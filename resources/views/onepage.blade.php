@extends('layouts.app')

@section('content')
{{-- Div animation : Scroll progression --}}
<div id="scroll-indicator">
    <div class="inner-circle">
        <div class="scroll-arrow">&#x2193;</div>
    </div>
</div>

{{-- Anchor : Home --}}
<a id="#" href=""></a>

{{-- Section : Accueil (banner) --}}
<section class="banner pt-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 casaImayahTitle d-flex flex-column justify-content-center align-items-center">
                <div class="bannerTitle text-center">
                    <div>{{ $data['accueil']['mainTitle1'] ?? '' }}</div>
                    <div class="name">
                        <div>{{ $data['accueil']['mainTitle2'] ?? '' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Section Accueil (banner): END  --}}

{{-- Anchor : Qui suis-je ? --}}
<a id="QuiSuisJe" href=""></a>

{{--  Section : Qui suis-je ? --}}
<section class="sectionQuiSuisJe py-5">
    <div class="container">
        <div class="col-12 my-5">
            <h1 class="text-center text-muted mainTitles py-5">{{ $data['qui-suis-je']['mainTitle'] ?? '' }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                <img src="{{ $data['qui-suis-je']['imgProfil'] ?? '' }}" alt="Photo de France-Alexandra"
                class="img-fluid rounded-2 w-100 F-A" style="max-width: 450px;">
            </div>
            <div class="col-lg-6 pe-5">
                <article class="p-lg-5">
                    <p class="text-muted text-center text-lg-center mt-4">
                        {{ $data['qui-suis-je']['txtProfil'] ?? '' }}
                    </p>
                </article>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 my-5">
                <h1 class="text-center text-muted mainTitles py-5">{{ $data['qui-suis-je']['secondTitle'] ?? '' }}</h1>
            </div>
        </div>
    </div><!-- container END -->
    <div class="d-flex Bxl-Sicile">
        @foreach (['imgBxl' => 'Photo de Bruxelles', 'imgSicile' => 'Photo de la Sicile'] as $key => $alt)
        <div class="w-50">
            <img src="{{ $data['qui-suis-je'][$key] ?? '' }}" class="img-half" alt="{{ $alt }}">
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-12 my-5">
                <article class="my-5">
                    @foreach (range(1, 4) as $i)
                    @php $txtKey = "txtBxlSi{$i}"; @endphp
                    @if (!empty($data['qui-suis-je'][$txtKey]))
                    <p class="text-center text-muted">
                        {{ $data['qui-suis-je'][$txtKey] }}
                    </p>
                    @endif
                    @endforeach
                </article>
            </div>
        </div>
    </div>
</section>
{{--  Section : Qui suis-je ? END  --}}

{{-- Anchor : Section soins  --}}
<a id="Soins" href=""></a>

{{-- Section : Soins --}}
<section class="soins py-5 text-light">
    <div class="container py-5">
        <h1 class="text-center mainTitles py-5 my-5">{{ $data['soins']['mainTitle'] ?? '' }}</h1>
        <div class="row g-4 justify-content-center">
            @foreach($data['soins']['cards'] as $index => $card)
            <div class="col-12 col-md-8 mb-5 card-wrapper {{ $index % 2 === 0 ? 'card-left' : 'card-right' }}">
                <div class="card h-100">
                    <img src="{{ $card['img'] }}" class="card-img-top"
                    alt="{{ $card['title'] }}"
                    @if($index === 2) style="height: 250px; object-fit: cover; object-position: 50% 20%;" @endif>
                    <div class="card-body d-flex flex-column text-center text-muted">
                        <h2 class="card-title text-muted fs-2 my-4">{{ $card['title'] }}</h2>
                        <article class="my-2">
                            <p class="card-text flex-grow-1">{{ $card['text'] }}</p>
                            <section class="my-5">
                                @foreach($card['details'] as $detail)
                                <div class="my-4">
                                    <h3 class="fw-bolder mb-2">{{ $detail['title'] }}</h3>
                                    <p>{!! $detail['text'] !!}</p>
                                </div>
                                @endforeach
                            </section>
                        </article>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- Section : Soins END --}}

{{-- Anchor : Section créations --}}
<a id="Créations" href=""></a>

{{-- Section : Créations --}}
<section class="sectionCreation text-light text-center py-5">
    
        <h1 class="text-center text-muted sectionCreationTitle py-5">{{ $creations['mainTitle'] ?? '' }}</h1>

        @foreach ($creations['sections'] as $index => $section)
            @if ($section['type'] === 'carousel')
                @if ($loop->first)
                    {{-- ✅ Slider horizontal personnalisé pour le premier bloc --}}
                    <div class="card my-5 border-0 rounded-0">
                        <div class="slider-container">
                            <div class="slider-track">
                                @foreach ($section['images'] as $image)
                                    <div class="slider-item">
                                        <img src="{{ $image }}" class="img-fluid rounded-3" alt="Création">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ $section['title'] }}</h4>
                            <p class="card-text p-3">{{ $section['description'] }}</p>
                            @if (!empty($section['description2']))
                                <p class="card-text p-3">{{ $section['description2'] }}</p>
                            @endif
                            <p class="card-text">
                                <a href="#" class="text-muted btn">{{ $section['cta'] }}</a>
                            </p>
                        </div>
                    </div>
                @else
                <div class="container">
                    {{-- Carousel Bootstrap pour les autres --}}
                    <div class="card my-5 border-0 rounded-0">
                        <div class="row gy-2 align-items-center">
                            <div class="col-md-12">
                                @php $carouselId = 'carouselCreation' . $index; @endphp
                                <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                    <div class="carousel-indicators">
                                        @foreach ($section['images'] as $imgIndex => $image)
                                            <button type="button"
                                                    data-bs-target="#{{ $carouselId }}"
                                                    data-bs-slide-to="{{ $imgIndex }}"
                                                    class="{{ $imgIndex === 0 ? 'active' : '' }}"
                                                    aria-current="{{ $imgIndex === 0 ? 'true' : 'false' }}"
                                                    aria-label="Slide {{ $imgIndex + 1 }}">
                                            </button>
                                        @endforeach
                                    </div>

                                    <div class="carousel-inner">
                                        @foreach ($section['images'] as $imgIndex => $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ $image }}" class="d-block w-100 img-fluid rounded-3" alt="Création">
                                            </div>
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">{{ $section['title'] }}</h4>
                                    <p class="card-text p-3">{{ $section['description'] }}</p>
                                    @if (!empty($section['description2']))
                                        <p class="card-text p-3">{{ $section['description2'] }}</p>
                                    @endif
                                    <p class="card-text">
                                        <a href="#" class="text-muted btn">{{ $section['cta'] }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @elseif ($section['type'] === 'imageText')
                {{-- Bloc image + texte --}}
                <div class="card my-5 border-0 rounded-0 write">
                    <div class="row my-5 align-items-center">
                        <div class="col-md-6">
                            <img src="{{ $section['image'] }}" class="img-fluid rounded-3" alt="Image texte">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title mb-4">{{ $section['title'] }}</h4>
                                <ul class="list-group list-group-flush p-2 my-4">
                                    @foreach ($section['items'] as $item)
                                        <li class="list-group-item text-start BodoniFont text-muted">{{ $item }}</li>
                                    @endforeach
                                </ul>
                                <p class="card-text">
                                    <a href="#" class="text-muted btn">{{ $section['cta'] }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
{{-- Section : Créations END --}}

    {{-- Anchor : Section activités --}}
    <a id="Activités" href=""></a>

    {{-- Section : Activités --}}
    {{-- Parti à optimiser --}}
    <section class="card-bloc py-5 text-light">
                <div id="cards" class="container">
                    <div class="row my-5">
                        <h1 class="text-center mainTitles py-5">Les activités</h1>
                        <article class="card-body">
                            <div class="my-5">
                                <h3 class="card-title whiteFont mb-5">Ateliers & collaborations</h3>
                            </div>
                            <ul class="list-group list-group-flush rounded-2">
                                <li class="list-group-item DastinFont text-center fs-4">
                                    <div class="row my-4 gy-4 align-items-center">
                                        <h4>Cérémonies des plantes</h4>
                                        <div class="col-12 col-md-4">
                                            <img src="./assets/img/activités/profilActivités.JPG" alt=""
                                                class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <section>
                                                <article>
                                                    <p class="p-1">Pour avoir plus de précision (prix, programme,
                                                        calendrier, ... ) sur l'atelier, n'hésitez pas à cliquer sur le
                                                        bouton : en savoir ! En cliquant sur le bouton les informations
                                                        seront visibles à l'écran et téléchargées sur votre ordinateur.</p>
                                                </article>
                                                <div class="mt-5">
                                                    <a href="./assets/pdf/ateliers&collaborations/CérémonieDesPlantes.pdf"
                                                        class="btn btn-order btn-lg me-5 rounded-5"
                                                        download="Infos atelier">En savoir plus</a>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <!--Slider Bootstrap5-->
                                            <div id="bijouxSlider" class="carousel carousel-fade mx-auto my-3"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner rounded-2">
                                                    <div class="carousel-item active">
                                                        <img src="./assets/img/activités/ateliers&collaborations/cérémonieDesPlantes/cérémonie1.jpeg"
                                                            class="d-block w-100" alt="Bijoux 1">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/cérémonieDesPlantes/cérémonie2.jpg"
                                                            class="d-block w-100" alt="Bijoux 2">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/cérémonieDesPlantes/cérémonie3.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/cérémonieDesPlantes/cérémonie4.jpeg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item DastinFont text-center fs-4">
                                    <div class="row my-4 gy-4 align-items-center">
                                        <h4>Bijoux de l'âme</h4>
                                        <div class="col-12 col-md-4">
                                            <img src="./assets/img/activités/profilActivités.JPG" alt=""
                                                class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <section>
                                                <article>
                                                    <p class="p-1">Pour avoir plus de précision (prix, programme,
                                                        calendrier, ... ) sur l'atelier, n'hésitez pas à cliquer sur le
                                                        bouton : en savoir ! En cliquant sur le bouton les informations
                                                        seront visibles à l'écran et téléchargées sur votre ordinateur.</p>
                                                </article>
                                                <div class="mt-5">
                                                    <a href="./assets/pdf/ateliers&collaborations/BijouxDeLAme.pdf"
                                                        class="btn btn-order btn-lg me-5 rounded-5"
                                                        download="Infos atelier">En savoir plus</a>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <!--Slider Bootstrap5-->
                                            <div id="bijouxSlider" class="carousel carousel-fade mx-auto my-3"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner rounded-2">
                                                    <div class="carousel-item active">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux1.jpg"
                                                            class="d-block w-100" alt="Bijoux 1">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux2.jpg"
                                                            class="d-block w-100" alt="Bijoux 2">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux3.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux4.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux5.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux6.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux7.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux8.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux9.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/img/activités/ateliers&collaborations/bijoux/bijoux10.jpg"
                                                            class="d-block w-100" alt="Bijoux 3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </article>
                        <article class="card-body my-5 blocRetraites">
                            <div class="my-5">
                                <h3 class="card-title whiteFont mb-5">Retraites</h3>
                            </div>
                            <ul class="list-group list-group-flush rounded-2">
                                <li class="list-group-item text-center">
                                    <div class="row justify-content-center mt-4 text-center">
                                        <h4 class="my-5">Le voyage de l'âme</h4>
                                        <div class="retraiteImg w-100">
                                            <img src="./assets/img/activités/retraites/voyageDeLame/Visualizza foto recenti.jpg"
                                                alt="" class="img-half">
                                        </div>
                                        <section class="d-flex">
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Le voyage de l'âme sur le 8 + en ligne</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/retraiteNoto.pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos retraite à Noto">En savoir plus</a>
                                                </div>
                                            </article>
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Le voyage de l'âme sur le 8</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/retraiteMorv.pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos retraite Morvan">En savoir plus</a>
                                                </div>
                                            </article>
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Le voyage de l'âme & le Fil de Soi</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/retraiteSicile.pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos retraite Sicile">En savoir plus</a>
                                                </div>
                                            </article>
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Le Voyage de l'Ame & l'Union Sacrée</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/Union Sacrée .pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos voyage de l'âme en ligne">En savoir plus</a>
                                                </div>
                                            </article>
                                        </section>
                                    </div>
                                </li>
                                <li class="list-group-item text-center">
                                    <div class="row justify-content-center mt-4 text-center">
                                        <h4 class="my-5">Le soleil levant</h4>
                                        <div class="retraiteImg w-100">
                                            <img src="./assets/img/activités/retraites/soleilLevant/soleil.jpg" alt=""
                                                class="img-half">
                                        </div>
                                        <section class="d-flex justify-content-center align-center">
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Soleil levant</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/retraiteNoto.pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos retraite à Noto">En savoir plus</a>
                                                </div>
                                            </article>
                                        </section>
                                    </div>
                                </li>
                                <li class="list-group-item text-center">
                                    <div class="row justify-content-center mt-4 text-center">
                                        <h4 class="my-5">Collaboration à la Wild Hearts Yoga retreat Sicily</h4>
                                        <div class="retraiteImg w-100">
                                            <img src="./assets/img/activités/retraites/wildHeartsYoga/wildHearts.jpg" alt=""
                                                class="img-half">
                                        </div>
                                        <section class="d-flex justify-content-center align-center">
                                            <article class="col-12 col-sm-6 col-lg-3 my-5">
                                                <h5 class="mb-4">Wild Haerts Yoga retreat Sicily</h5>
                                                <div class="blocBtn">
                                                    <a href="./assets/pdf/voyageDeLAme/retraiteNoto.pdf"
                                                        class="btn btn-order btn-lg me-5 DastinFont rounded-5"
                                                        download="Infos retraite à Noto">En savoir plus</a>
                                                </div>
                                            </article>
                                        </section>
                                    </div>
                                </li>
                            </ul>
                        </article>
                    </div>
                </div>
        </section>
    {{-- Section : Activités END--}}

    {{-- Anchor : Section Casa Imayah --}}
    <a id="CasaImayah" href=""></a>

    {{-- Section : Casa Imayah --}}
    <section class="sectionContact py-5">
        <h1 class="text-center text-muted mainTitles py-5 my-5">Découvrez Casa Imayah en Sicile</h1>
        <div class="w-100">
            <div class="casaImayahBanner">
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <article class="my-5">
                        <p class="text-center text-muted p-5">
                           "Nous vous invitons à entrer dans notre aventure, un espace pensé pour vous offrir du repos, des retraites ressourçantes, une reconnexion profonde, des instants de partage et une touche d’inspiration… le tout dans une simplicité sincère et apaisante.
                            Envie de vous ressourcer dans un havre de paix ? Vous êtes au bon endroit." 
                        </p>
                        <p class="text-center text-muted">
                           Pour visiter le site web : Casa Imayah, n'hésitez pas cliquer sur le bouton ci-dessous !
                        </p>
                    </article>
                    <div class="mt-5 d-flex align-items-center justify-content-center">
                        <a href="https://www.casaimayah.it"
                           class="btn btn-order btn-lg me-5 rounded-5 DastinFont"
                           download="Infos atelier">Allers vers le site Casa Imayah</a>
                    </div>
                </div>
            </div>
    </section>
    {{-- Section : Casa Imayah END--}}

    {{-- Anchor : Section Contact --}}
    <a id="Contact" href=""></a>

    {{-- Section : Contact --}}
    <section class="card-contact">
        <div id="cards" class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mainTitles py-5 my-5">Comment me contacter ?</h1>
                        <form class="rounded-5 border p-5 d-flex align-items-center justify-content-center" action="{{ route('contact.store')  }}"
                              method="POST" id="contact-form">
                              @csrf
                            <div class="col-md-12 col-12 my-5 p-5">
                                <div class="mb-3">
                                    <label for="name" class="form-label mb-3">Nom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Veuillez indiquer votre nom de famille" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="firstName" class="form-label mb-3">Prénom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                                    placeholder="Veuillez indiquer votre prénom" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label mb-3">Téléphone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" class="form-control" id="tel" name="tel"
                                                    placeholder="Veuillez indiquer votre numéro de téléphone" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label mb-3">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Veuillez indiquer votre adresse mail" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label mb-3">Message</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-chat-text"></i></span>
                                        <textarea class="form-control " id="message" name="message"
                                                    placeholder="Laissez-moi votre message" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center my-5">
                                    <button type="submit" class="btn btn-order rounded-5 DastinFont">Envoyer</button>
                                </div>
                            </div>
                            {{-- Msg de confirmation si l'envoi est ok --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-message">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
    </section>
    {{-- Section : Contact END--}}
@endsection