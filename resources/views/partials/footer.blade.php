<footer class="site-footer text-muted py-5">
    {{-- Top: Site title + small subtitle --}}
    <div class="footer-top text-center my-5">
        <h2 class="site-title DastinFont mb-2">Imayah</h2>
        <p class="small mb-0 fw-bold ">Entre Bruxelles et Noto — soins, ateliers et retraites</p>
    </div>

    <div class="row text-start gy-4 align-items-start p-4">
        {{-- Column 1: Lieux + carte --}}
        <div class="col-12 col-md-4">
            <h4 class="fw-bold my-4">{{ $data['footer']['adresse_title'] ?? 'Lieux' }}</h4>


            <div class="location mb-3">
                <h5 class="fw-bold">{{ $data['footer']['title_be'] ?? 'Bruxelles' }}</h5>
                <p class="small mb-1">{{ $data['footer']['adresse_be'] ?? '' }}</p>
            </div>


            <div class="location">
                <h5 class="fw-bold">{{ $data['footer']['title_it'] ?? 'Noto (Sicile)' }}</h5>
                <p class="small mb-0">{{ $data['footer']['adresse_it'] ?? '' }}</p>
            </div>


            <div class="map-wrapper mt-3">
                <div id="mapid" class="container-fluid" role="img" aria-label="Carte des localisations"></div>
            </div>
        </div>


        {{-- Column 2: Coordonnées / téléphone / horaires --}}
        <div class="col-12 col-md-4 text-center">
            <h4 class="fw-bold my-4">{{ $data['footer']['coordonnees_title'] ?? 'Coordonnées' }}</h4>


            <p class="mb-1">
                <a href="tel:{{ $data['footer']['tel_be'] ?? ($data['footer']['tel_it'] ?? '') }}"
                    class="text-dark d-inline-flex align-items-center">
                    <i class="fas fa-phone me-2" aria-hidden="true"></i>
                    {{ $data['footer']['tel_be'] ?? ($data['footer']['tel_it'] ?? '') }}
                </a>
            </p>
        </div>


        {{-- Column 3: Message / mail / bouton --}}
        <div class="col-12 col-md-4 text-center">
            <h4 class="fw-bold my-4">{{ $data['footer']['mail_title'] ?? 'Contact' }}</h4>


            <p class="small mb-3">
                {{ $data['footer']['txt_mail'] ?? 'Pour toute demande et informations, n’hésitez pas.' }}</p>


            <a href="mailto:{{ $data['footer']['email'] ?? 'imayah@ecomail.fr' }}"
                class="btn btn-order btn-lg mx-auto rounded-5 DastinFont">
                    Email
            </a>

        </div>
    </div>


    <div class="footer-bottom mt-4 text-center small text-muted">
        <div class="mt-4 small text-muted">
            <p class="mb-1">&copy; {{ date('Y') }} Imayah — Webmaster :
                <a href="{{ $data['footer']['webmaster']['url'] ?? '#' }}" target="_blank"
                    rel="noopener noreferrer">{{ $data['footer']['webmaster']['name'] ?? '' }}</a>
            </p>
        </div>
    </div>


    </div>
</footer>
