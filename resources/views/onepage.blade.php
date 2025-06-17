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
                <div class="col-md-6">

                </div>
                <div class="col-md-6 casaImayahTitle d-flex flex-column justify-content-center align-items-center">
                    <div class="bannerTitle text-center">
                        <div>{{ $data['accueil']['mainTitle1'] ?? '' }}</div>
                        <div class="name">
                            <div>{{ $data['accueil']['mainTitle2'] ?? '' }}</div>
                            <div>{{ $data['accueil']['mainTitle3'] ?? '' }}</div>
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

    {{-- Anchor : Section soins ? --}}
    <a id="Soins" href=""></a>

    {{-- Section : Soins --}}
    <section class="soins py-5 text-light">
                <div class="container py-5">
                    <h1 class="text-center mainTitles py-5 my-5">{{ $data['soins']['mainTitle'] ?? '' }}</h1>
                    <div class="row g-4 justify-content-center">
                        <!-- Card 1 : gauche -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-left">
                            <div class="card h-100">
                                <img src="{{ $data['soins']['imgCard1'] ??  '' }}" class="card-img-top" alt="Soin énergétique">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">{{ $data['soins']['titleCard1'] ??  '' }}</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">
                                            {{ $data['soins']['txtCard1'] ??  '' }}
                                        </p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">
                                                    {{ $data['soins']['subTitle1'] ??  '' }}
                                                </h3>
                                                <p>{{ $data['soins']['subTxt1'] ??  '' }}</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">
                                                    {{ $data['soins']['subTitle2'] ??  '' }}
                                                </h3>
                                                <p>{{ $data['soins']['subTxt2'] ??  '' }}</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">
                                                    {{ $data['soins']['subTitle3'] ??  '' }}
                                                </h3>
                                                <p>{{ $data['soins']['subTxt3'] ??  '' }}</p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 : droite -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-right">
                            <div class="card h-100">
                                <img src="{{ $data['soins']['imgCard2'] ?? '' }}" class="card-img-top" alt="Massage vibratoire">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">{{ $data['soins']['titleCard2'] ?? '' }}</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">
                                            {{ $data['soins']['txtCard2'] ?? '' }}
                                        </p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">{{ $data['soins']['subTitle1Card2'] ?? '' }}</h3>
                                                <p>
                                                    {{ $data['soins']['subTxt1Card2'] ?? '' }}
                                                </p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">{{ $data['soins']['subTitle2Card2'] ?? '' }}</h3>
                                                <p>
                                                    {{ $data['soins']['subTxt2Card2'] ?? '' }}
                                                </p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">{{ $data['soins']['subTitle3Card2'] ?? '' }}</h3>
                                                <p>
                                                    {{ $data['soins']['subTxt3Card2'] ?? '' }}
                                                </p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 : gauche -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-left">
                            <div class="card h-100">
                                <img src="./assets/img/cards/cards3.jpg" class="card-img-top"
                                    alt="Accompagnement thérapeutique" style="height: 250px; object-fit: cover; object-position: 50% 20%;">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">Accompagnement thérapeutique</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">Par le verbe enraciné dans les outils de la
                                            psychologie des profondeurs...</p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Lieu</h3>
                                                <p>Á Bruxelles et en Sicile</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Durée 1ère séance</h3>
                                                <p>2h</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Prix</h3>
                                                <p>130 &euro;</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">À partir de la 2e séance :</h3>
                                                <p>1h30</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Prix</h3>
                                                <p>110 &euro;</p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 : droite -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-right">
                            <div class="card h-100">
                                <img src="./assets/img/cards/cards4.jpg" class="card-img-top" alt="Méditation">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">Méditation</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">En petit groupe de max 6 personnes, cet atelier a
                                            pour intention d’emprunter cette voie ancestrale de connaissance de soi qu’est
                                            la méditation...</p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Lieu</h3>
                                                <p>Á Bruxelles et en Sicile</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Durée</h3>
                                                <p>2h</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Prix</h3>
                                                <p>35 &euro;</p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 : gauche -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-left">
                            <div class="card h-100">
                                <img src="./assets/img/cards/cards5.jpg" class="card-img-top" alt="Soin de l'âme">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">Soin de l'âme</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">Soutenu par la transe, ce soin est un dialogue avec
                                            l’âme...</p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Lieu</h3>
                                                <p>Á Bruxelles et en Sicile</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Durée</h3>
                                                <p>1h30</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Prix</h3>
                                                <p>110 &euro;</p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 : droite -->
                        <div class="col-12 col-md-8 mb-5 card-wrapper card-right">
                            <div class="card h-100">
                                <img src="./assets/img/soins/BainSonor.PNG" class="card-img-top" alt="Bain sonore">
                                <div class="card-body d-flex flex-column text-center text-muted">
                                    <h2 class="card-title text-muted fs-2 my-4">Bain sonore</h2>
                                    <article class="my-2">
                                        <p class="card-text flex-grow-1">En cercle de max 12 personnes dans une yourte
                                            mongole, ce soin vibratoire est une immersion dans l’univers des sons...</p>
                                        <section class="my-5">
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Lieu</h3>
                                                <p>En Sicile</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Durée</h3>
                                                <p>1h30</p>
                                            </div>
                                            <div class="my-5">
                                                <h3 class="fw-bolder mb-3">Prix</h3>
                                                <p> &euro;</p>
                                            </div>
                                        </section>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection