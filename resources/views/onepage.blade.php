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
    <div class="container">
        <h1 class="text-center text-muted sectionCreationTitle py-5">{{ $creations['mainTitle'] ?? '' }}</h1>

        @foreach ($creations['sections'] as $index => $section)
            @if ($section['type'] === 'carousel')
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
                                            <img src="{{ $image }}" class="d-block w-100 img-fluid rounded-3" alt="...">
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
                                <p class="card-text">
                                    <a href="#" class="text-muted btn">{{ $section['cta'] }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($section['type'] === 'imageText')
                <div class="card my-5 border-0 rounded-0 write">
                    <div class="row my-5 align-items-center">
                        <div class="col-md-6">
                            <img src="{{ $section['image'] }}" class="img-fluid rounded-3" alt="...">
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

        
        @endsection