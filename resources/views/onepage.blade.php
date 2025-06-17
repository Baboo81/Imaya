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
@endsection