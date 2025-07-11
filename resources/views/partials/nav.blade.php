
            <!-- Google Tag Manager (noscript) Google analytics-->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXTDTSDJ" height="0" width="0"
                    style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <!--Nav-->
            <nav class="perso-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
                <div class="container-fluid">
                    <img class="logo-navbar" src="/assets/img/svg/logoImayah.svg" id="logo2"
                        alt="Logo Imayah représentant un arbre">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-5">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown mx-5">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('onepageData.nav.services') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#Soins">
                                            {{ __('onepageData.nav.dropdown.soins') }}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#Créations">
                                            {{ __('onepageData.nav.dropdown.creations') }}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#Activités">
                                            {{ __('onepageData.nav.dropdown.activites') }}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#CasaImayah">
                                            {{ __('onepageData.nav.dropdown.casa') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item mx-5">
                                <a class="nav-link" aria-current="page" href="#QuiSuisJe">
                                    {{ __('onepageData.nav.qui-suis-je') }}
                                </a>
                            </li>
                            <li class="nav-item mx-5">
                                <a class="nav-link" aria-current="page" href="#Contact">
                                    {{ __('onepageData.nav.contact') }}
                                </a>
                            </li>
                            <li class="nav-item d-flex mx-5">
                                <a class="nav-link {{ app()->getLocale() === 'fr' ? 'active' : '' }} " aria-current="page" href="{{ route('onepage', ['locale' => 'fr']) }}">
                                    {{ __('onepageData.nav.langues.fr') }}
                                </a>
                                <a class="nav-link {{ app()->getLocale() === 'en' ? 'active' : '' }}" aria-current="page" href="{{ route('onepage', ['locale' => 'en']) }}">
                                    {{ __('onepageData.nav.langues.en') }}
                                </a>
                                <a class="nav-link {{ app()->getLocale() === 'it' ? 'active' : '' }}" aria-current="page" href="{{ route('onepage', ['locale' => 'it']) }}">
                                    {{ __('onepageData.nav.langues.it') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Nav END-->
        