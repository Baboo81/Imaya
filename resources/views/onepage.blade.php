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
                    <h1 class="bannerTitle">{{ $data['accueil']['mainTitle1'] ?? '' }}</h1>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="name">
                        <h1 class="">{{ $data['accueil']['mainTitle2'] ?? '' }}</h1>
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
            <h1 class="text-center text-muted mainTitles py-5">{{ $data['qui_suis_je']['mainTitle'] ?? '' }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                <img src="{{ ik_url($data['qui_suis_je']['imgProfil'] ?? '' ) }}" alt="Photo de France-Alexandra"
                class="img-fluid rounded-2 w-100 F-A" style="max-width: 450px;">
            </div>
            <div class="col-lg-6 pe-5">
                <article class="">
                    <p class="text-muted text-center text-lg-center mt-4">
                        {{ $data['qui_suis_je']['txtProfil'] ?? '' }}
                    </p>
                </article>
            </div>
        </div>
        <div class="row">
            <article>
                <p class="text-muted text-center text-lg-center my-5">
                    {{ $data['qui_suis_je']['txtProfil2'] ?? '' }}
                </p>
                 <p class="text-muted text-center text-lg-center my-5">
                    {{ $data['qui_suis_je']['txtProfil3'] ?? '' }}
                </p>
            </article>
        </div>
        <div class="row my-5">
            <div class="col-12 my-5">
                <h1 class="text-center text-muted mainTitles py-5">{{ $data['qui_suis_je']['secondTitle'] ?? '' }}</h1>
            </div>
        </div>
    </div><!-- container END -->
    <div class="d-flex Bxl-Sicile">
        @foreach (['imgBxl' => 'Photo de Bruxelles', 'imgSicile' => 'Photo de la Sicile'] as $key => $alt)
        <div class="w-50">
            <img src="{{ ik_url($data['qui_suis_je'][$key] ?? '') }}" class="img-half" alt="{{ $alt }}">
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row my-5 align-items-center">
            <div class="col-lg-12 my-5">
                <article class="my-5 quiSuisJe-Article">
                    @foreach (range(1, 4) as $i)
                        @php $txtKey = "txtBxlSi{$i}"; @endphp
                        @if (!empty($data['qui_suis_je'][$txtKey]))
                            <p class="text-center text-muted">
                                {{ $data['qui_suis_je'][$txtKey] }}
                            </p>
                        @endif
                    @endforeach
                </article>
            </div>
        </div>
    </div>
   <!-- Slider : cabinet -->
    <div class="w-100 overflow-hidden slider-cabinet" style="background-color: #B36700;">
        <div class="slider-track d-flex">
            @php
                $cabinetImages = $data['qui_suis_je']['imgSliderCabinet'];
                // On duplique les images pour donner l'impression d'une boucle infinie
                $allImages = array_merge($cabinetImages, $cabinetImages);
                $rotateImages = ['cabinet2.jpg', 'cabinet3.jpg'];
            @endphp

            @foreach ($allImages as $img)
                @php
                    $imgName = basename(trim($img));
                    $rotate = in_array($imgName, $rotateImages);
                    $special = ($imgName === 'cabinet5.jpeg'); // classe spécifique pour cabinet5
                    $specialRotate = ($imgName === 'cabinet4.jpg'); // Rotation particulère pour : cabinet4.jpg
                @endphp
                <div class="slider-item {{ $special ? 'special-img-container' : '' }}">
                    <img src="{{ ik_url(trim($img)) }}"
                        alt="Photos du cabinet à Bruxelles et en Sicile"
                        class="{{ $rotate ? 'rotate-90' : '' }}
                               {{ $specialRotate ? 'rotate-cabinet4' : ''}}
                               {{ $special ? 'special-img' : '' }}">
                </div>
            @endforeach
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
                    <img src="{{ ik_url($card['img']) }}" class="card-img-top"
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
@isset($creations)

<section class="sectionCreation text-light text-center py-5">
    <h1 class="text-center text-muted sectionCreationTitle py-5">
        {{ $creations['mainTitle'] ?? '' }}
    </h1>
     @foreach ($creations['sections'] as $index => $section)

        <h4 class="card-title my-5">{{ $section['title'] }}</h4>
            @if ($section['type'] === 'carousel')
                @if ($loop->first)
                    {{-- ✅ Slider horizontal personnalisé pour le premier bloc --}}
                    <div class="card my-5 border-0 rounded-0">
                        <div class="slider-container">
                            <div class="slider-track-creations">
                                @foreach ($section['images'] as $image)
                                    <div class="slider-item-creations dessinsVib">
                                        <img src="{{ ik_url($image['src']) }}" class="img-fluid rounded-3" alt="{{ $image['name'] }}">
                                        <p class="mt-2 text-muted">
                                            {{ $image['name'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">

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
                            <div class="col-md-12 my-5">
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

                                    <div class="carousel-inner sliderPaintings">
                                        @foreach ($section['images'] as $imgIndex => $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ ik_url($image) }}" class="d-block w-100 img-fluid rounded-3" alt="Les créations">
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
                            <img src="{{ ik_url($section['image']) }}" class="img-fluid rounded-3" alt="Image représentant des feuilles écrites à la main">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
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
@endisset
{{-- Section : Créations END --}}

    {{-- Anchor : Section activités --}}
    <a id="Activités" href=""></a>

    {{-- Section : Activités --}}
    <section class="card-bloc py-5 text-light">
        <div class="container">
            <div class="row my-5">
                <h1 class="text-center mainTitles py-5">
                    {{ $data['activite_title'] ?? '' }}
                </h1>

                {{-- Ateliers --}}
                <article class="card-body">
                    <div class="my-5">
                        <h3 class="card-title whiteFont mb-5">
                            {{ $data['activite_subTitle'] ?? '' }}
                        </h3>
                    </div>
                    <ul class="list-group list-group-flush rounded-2">
                        @foreach ($data['activites']['ateliers'] as $atelier)
                            <li class="list-group-item DastinFont text-center fs-4">
                                <div class="row my-4 gy-4 align-items-center flex-column flex-sl-row atelier-row">
                                    <h4>{{ $atelier['titre'] }}</h4>

                                    <div class="col-12 col-md-4">
                                        <img src="{{ ik_url('img/activites/' . $atelier['image']) }}"
                                            class="img-fluid rounded-circle"
                                            style="width: 300px; height: 300px; object-fit: cover;">

                                        {{-- Annotations sous l'image --}}
                                        @if (!empty($atelier['auteur']))
                                            <p class="mt-3 fst-italic small text-muted">
                                                {{ $atelier['txt_propose'] ?? '' }}
                                            </p>
                                            <p class="mt-3 fst-italic small text-muted">
                                                {{ $atelier['auteur'] }}
                                            </p>

                                        @endif
                                    </div>

                                    <div class="col-12 col-md-3 text-center d-flex flex-column align-items-center">
                                        <p class="p-1">{{ $atelier['description'] }}</p>
                                        <a href="{{ asset('assets/pdf/ateliers&collaborations/' . $atelier['pdf']) }}"
                                        class="btn btn-order btn-lg mt-2 rounded-5"
                                        download="Infos atelier">
                                            {{ $data['btn_enSavoirPlus'] ?? '' }}
                                        </a>
                                    </div>

                                    <div class="col-12 col-md-5 p-3 p-xl-5">
                                        <div id="carousel-{{ \Illuminate\Support\Str::slug($atelier['titre']) }}"
                                            class="carousel blocAteliers carousel-fade mx-auto my-3" data-bs-ride="carousel">
                                            <div class="carousel-inner rounded-2">
                                                @foreach ($atelier['slider'] as $i => $img)
                                                    <div class="carousel-item @if ($i == 0) active @endif">
                                                        <img src="{{ ik_url('img/' . $atelier['sliderPath'] . $img) }}"
                                                            class="d-block w-100" alt="Photos des ateliers">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </article>

               {{-- Retraites --}}
                <article class="card-body my-5 blocRetraites">
                    <div class="my-5">
                        <h3 class="card-title whiteFont mb-5">
                            {{ $data['activite_subTitle2'] ?? '' }}
                        </h3>
                    </div>

                    <ul class="list-group list-group-flush rounded-2 border border-secondary">
                        @foreach ($data['activites']['retraites'] as $retraite)
                            <li class="list-group-item text-center w-100 py-4 {{ $loop->last ? '' : 'border-bottom' }}">
                                <div class="row justify-content-center text-center">
                                    {{-- Titre de la retraite --}}
                                    <h4 class="my-4">{{ $retraite['groupe'] }}</h4>

                                    {{-- Images / Carousel --}}
                                    <div class="retraiteImg w-100 {{ $retraite['slug'] ?? '' }}">
                                        @if(!empty($retraite['images']) && is_array($retraite['images']))
                                            @php $carouselId = 'carousel-' . $loop->index; @endphp
                                            <div id="{{ $carouselId }}" class="carousel slide mb-4" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($retraite['images'] as $index => $img)
                                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ ik_url('img/activites/retraites/' . ltrim($img, '/')) }}"
                                                                class="d-block w-100 img-half {{ $retraite['slug'] . '-img' }}"
                                                                alt="Image retraite {{ $retraite['groupe'] }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if(count($retraite['images']) > 1)
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </button>
                                                @endif
                                            </div>
                                        @elseif(!empty($retraite['image']))
                                            <img src="{{ ik_url('img/activites/retraites/' . ltrim($retraite['image'], '/')) }}"
                                                alt="Image retraite {{ $retraite['groupe'] }}"
                                                class="img-half mb-4">
                                        @endif
                                    </div>

                                   {{-- Boutons PDF --}}
                                    <section class="d-flex flex-wrap justify-content-center my-5">
                                        @if($retraite['slug'] === 'soleil-levant')
                                            {{-- Bouton édition 2025 --}}
                                            <article class="col-12 col-sm-6 col-lg-3 my-3 text-center">
                                                <h6 class="mb-2">Édition 2025</h6>
                                                <a href="{{ asset('assets/pdf/retraites/leSoleilLevant/RetraiteSoleilLevant.pdf') }}"
                                                class="btn btn-order btn-lg DastinFont rounded-5"
                                                download="Soleil-Levant-2025.pdf">
                                                    {{ $data['btn_enSavoirPlus'] ?? 'En savoir plus' }}
                                                </a>
                                            </article>

                                            {{-- Bouton édition 2026 --}}
                                            <article class="col-12 col-sm-6 col-lg-3 my-3 text-center">
                                                <h6 class="mb-2">Édition 2026</h6>
                                                <a href="{{ asset('assets/pdf/retraites/leSoleilLevant/RetraiteSoleilLevant.pdf') }}"
                                                class="btn btn-order btn-lg DastinFont rounded-5"
                                                download="Soleil-Levant-2026.pdf">
                                                    {{ $data['btn_enSavoirPlus'] ?? 'En savoir plus' }}
                                                </a>
                                                <article class="col-12 my-3 text-center">
                                                    <p>
                                                        {{ $retraite['info_àvenir'] ?? '' }}
                                                    </p>
                                                </article>
                                            </article>
                                        @else
                                            @foreach ($retraite['evenements'] as $event)
                                                @php
                                                    $pdfPath = $event['path'];
                                                    $pdfExists = file_exists(public_path($pdfPath));
                                                    $pdfUrl = asset($pdfPath);

                                                    $pdfPath2 = $event['path2'] ?? null;
                                                    $pdfExists2 = $pdfPath2 && file_exists(public_path($pdfPath2));
                                                    $pdfUrl2 = $pdfPath2 ? asset($pdfPath2) : null;
                                                @endphp

                                                <article class="col-12 col-sm-6 col-lg-3 my-3">
                                                    <h5 class="my-5">{{ $event['titre'] }}</h5>
                                                    <div class="blocBtn d-flex flex-wrap justify-content-center">
                                                        @if($pdfExists)
                                                            <a href="{{ $pdfUrl }}" class="btn btn-order btn-lg me-5 DastinFont rounded-5" download="{{ $event['nom_pdf'] }}">
                                                                {{ $data['btn_enSavoirPlus'] ?? 'En savoir plus' }}
                                                            </a>
                                                        @else
                                                            <button class="btn btn-secondary disabled me-3">PDF indisponible</button>
                                                        @endif

                                                        @if($pdfExists2)
                                                            <a href="{{ $pdfUrl2 }}" class="btn btn-order btn-lg me-5 DastinFont rounded-5" download="{{ $event['nom_pdf'] }}">
                                                                {{ $data['btn_enSavoirPlus'] ?? 'En savoir plus' }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </article>
                                            @endforeach
                                        @endif
                                    </section>

                                    {{-- Infos supplémentaires --}}
                                    <section class="mt-5">
                                        @if(!empty($retraite['info_retraite']) && is_array($retraite['info_retraite']))
                                            @foreach($retraite['info_retraite'] as $info)
                                                <div class="row justify-content-center align-items-center my-5">
                                                    <div class="col-12 col-md-8">
                                                        <h5 class="mb-4">{{ $info['collaboratrice'] }}</h5>
                                                    </div>
                                                </div>

                                                @if(!empty($info['slider']))
                                                    @php $sliderId = 'slider-' . uniqid(); @endphp
                                                    <div id="{{ $sliderId }}" class="carousel slide mb-5" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach($info['slider'] as $index => $slideImg)
                                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                    <img src="{{ ik_url('img/activites/retraites/voyageDeLame/slider/' . ltrim($slideImg, '/')) }}"
                                                                        class="d-block w-100 rounded-3"
                                                                        alt="Photo de la retraite : {{ $retraite['groupe'] }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#{{ $sliderId }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"></span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#{{ $sliderId }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"></span>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @elseif(!empty($retraite['info_retraiteWildHearts']))
                                            {{-- Pour Wild Hearts --}}
                                            <div class="row justify-content-center align-items-center my-5">
                                                <div class="col-12 col-md-8 text-center">
                                                    <p class="mb-4">{{ $retraite['info_retraiteWildHearts'] }}</p>
                                                    @if(!empty($retraite['p1']) && !empty($retraite['link_site']))
                                                        <p>
                                                            {{ $retraite['p1'] }}
                                                            <a href="{{ $retraite['link_site'] }}" target="_blank" class="link-primary">
                                                                {{ $retraite['link_site'] }}
                                                            </a>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </section>
                                </div>
                            </li>
                        @endforeach
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
        <h1 class="text-center text-muted mainTitles py-5 my-5">
            {{ $data['casaImayah']['title'] ?? '' }}
        </h1>
        <div class="d-flex casaImayah">
             @foreach (['imgCasaImayah' => 'Photo aérienne de Casa Imayah', 'imgPiscine' => 'Photo de la piscine'] as $key => $alt)
                <div class="w-50">
                    <img src="{{ ik_url($data['casaImayah'][$key] ?? '') }}" class="img-half" alt="{{ $alt }}">
                </div>
            @endforeach
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <article class="my-5">
                        <p class="text-center text-muted p-5">
                          {{ $data['casaImayah']['p1'] ?? '' }}
                        </p>
                        <p class="text-center text-muted">
                          {{ $data['casaImayah']['p2'] ?? '' }}
                        </p>
                    </article>
                    <div class="mt-5 d-flex align-items-center justify-content-center">
                        <a href="https://www.casaimayah.it"
                           class="btn btn-order btn-lg mx-auto rounded-5 DastinFont"
                           download="Infos atelier">
                           {{ $data['btn_allerVers'] ?? '' }}
                        </a>
                    </div>
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
                    <h1 class="text-center mainTitles whiteFont py-5 my-5">
                        {{ $data['contact_title'] ?? '' }}
                    </h1>

                    <form class="rounded-5 border p-5" action="{{ route('contact.store') }}" method="POST" id="contact-form" novalidate>
                        @csrf

                        <div class="col-md-12 col-12 my-5 p-5">

                            {{-- Champ : honeypot --}}
                            <input type="text" name="website" style="display: none">

                            {{-- Nom --}}
                            <div class="mb-3">
                                <label for="name" class="form-label mb-2"> {{ $data['contact']['name'] }} </label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text custom-radius"><i class="bi bi-person"></i></span>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        placeholder="{{ $data['contact']['name_placeholder'] }}"
                                        value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Prénom --}}
                            <div class="mb-3">
                                <label for="firstName" class="form-label mb-2">{{ $data['contact']['first_name'] }}</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text custom-radius"><i class="bi bi-person"></i></span>
                                    <input type="text"
                                        class="form-control @error('firstName') is-invalid @enderror"
                                        id="firstName"
                                        name="firstName"
                                        placeholder="{{ $data['contact']['first_name_placeholder'] }}"
                                        value="{{ old('firstName') }}"
                                        required>
                                    @error('firstName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Téléphone --}}
                            <div class="mb-3">
                                <label for="tel" class="form-label mb-2">{{ $data['contact']['phone'] }}</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text custom-radius"><i class="bi bi-telephone"></i></span>
                                    <input type="tel"
                                        class="form-control @error('tel') is-invalid @enderror"
                                        id="tel"
                                        name="tel"
                                        placeholder="{{ $data['contact']['phone_placeholder'] }}"
                                        value="{{ old('tel') }}"
                                        required>
                                    @error('tel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label mb-2"> {{ $data['contact']['email'] }} </label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text custom-radius"><i class="bi bi-envelope"></i></span>
                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        placeholder="{{ $data['contact']['email_placeholder'] }}"
                                        value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div class="mb-3">
                                <label for="message" class="form-label mb-2">{{ $data['contact']['message'] }}</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text custom-radius"><i class="bi bi-chat-text"></i></span>
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                            id="message"
                                            name="message"
                                            placeholder="{{ $data['contact']['message_placeholder'] }}"
                                            required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Bouton d'envoi --}}
                            <div class="text-center my-5">
                                <button type="submit" class="btn btn-order rounded-5 DastinFont">{{ $data['contact']['send'] }}</button>
                            </div>

                            {{-- Message de succès --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-message">
                                    {!! session('success') !!} {!! $data['contact']['success2'] !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Section : Contact END --}}
@endsection


