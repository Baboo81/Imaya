<footer class="py-5">
        <div class="row text-center p-5">

            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <section class="nav flex-column">
                    <h4 class="text-center mb-5">
                        {{ $data['footer']['adresse_title'] ?? '' }}
                    </h4>
                    <p>
                        {{ $data['footer']['adresse_it'] ?? '' }}
                    </p>
                    <div id="mapid" class="container-fluid" style="height: 150px;"></div>
                </section>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <section class="nav flex-column">
                    <h4 class="mb-5">
                        {{ $data['footer']['coordonnees_title'] ?? '' }}
                    </h4>
                    <div>
                        <h3>
                            {{ $data['footer']['subTitle_it'] ?? '' }}
                        </h3>
                        <a href="tel:"
                            class="d-inline-flex justify-content-center align-items-center text-decoration-none text-dark">
                            <i class="fas fa-phone me-2 fs-5"></i>
                            {{ $data['footer']['tel_it'] ?? '' }}
                        </a>
                    </div>
                    <div class="my-5">
                        <h3>
                            {{ $data['footer']['subTitle_bxl'] ?? '' }}
                        </h3>
                        <a href="tel:"
                            class="d-inline-flex justify-content-center align-items-center text-decoration-none text-dark">
                            <i class="fas fa-phone me-2 fs-5"></i>
                            {{ $data['footer']['tel_bxl'] ?? '' }}
                        </a>
                    </div>
                </section>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <ul class="nav flex-column">
                    <h4 class="mb-5">
                        {{ $data['footer']['mail_title'] ?? '' }}
                    </h4>
                    <p>
                        {{ $data['footer']['txt_mail'] ?? '' }}
                    </p>
                    <a href="mailto:imayah@ecomail.fr" class="text-dark fs-4">
                        <i class="fas fa-envelope"></i>
                    </a>
                </ul>
            </div>

        </div>

        <div class="my-5">
            <p class="text-center DastinFont mt-2"></p>
        </div>
    </footer>