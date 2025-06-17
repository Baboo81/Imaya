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
    {{-- Section Accueil (banner) --}}
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
@endsection