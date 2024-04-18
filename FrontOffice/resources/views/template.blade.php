<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ENGAGEMENT LEUCEMIE">  
    <meta name="robots" content="index,follow">

    <title>Accueil-Engagement-Leucemie-ED</title>

    <!-- // LINK CSS // -->
    <link rel="stylesheet" href="{{ asset('FrontOffice/public/assets/css/style.css') }}">
    <!-- CDN REMIXICON // -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- // CSS SWIPER JS // -->
    <link rel="stylesheet" href="{{ asset('FrontOffice/public/assets/css/swiper-bundle.min.css')}}"/>
    <!-- // FAVICON  // -->
    <link rel="shortcut icon" href="{{ asset('FrontOffice/public/assets/img/logo/logo.png') }}"/>

</head>
<body>

    <!-- // NAVBAR // -->   
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{route('accueil-show')}}" class="logo-img">
                    <img src="{{ asset ('FrontOffice/public/assets/img/logo/logo.png') }}" alt="logo-Engagement-Leucemie" class="logo-el"/>            
                </a>
            </div>
            <div class="nav-links">
                <ul>
                    <li>
                        <a href="{{route('accueil-show')}}" class="lg nav-text">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{route('temoignage-show')}}" class="lg nav-text">
                            Témoignages
                        </a>
                    </li>
                    <li class="dropdown">
                        <p class="lg nav-text">
                            Actions
                            <i class="ri-arrow-down-s-line lg"></i>
                        </p>
                        <div class="dropdown-content">
                            <a href="{{route('actions-show')}}" class="text">
                                Action à venir
                            </a>
                            <a href="#" class="text">
                                Anciennes Actions
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="https://www.dondemoelleosseuse.fr/" class="lg nav-text border-bottom">
                            Devenir donneur
                        </a>
                    </li>
                    <li class="dropdown">
                        <p class="lg nav-text">
                            Don moelle osseuse
                            <i class="ri-arrow-down-s-line lg"></i>
                        </p>
                        <div class="dropdown-content">
                            <a href="{{route('don-moelle-osseuse-show')}}" class="text">
                                C'est quoi ?
                            </a>
                            <a href="{{route('age-moelle-osseuse-show')}}" class="text">
                                Pourquoi 18-35 ans ?
                            </a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <p class="lg nav-text">Association
                            <i class="ri-arrow-down-s-line lg"></i>
                        </p>
                        <div class="dropdown-content">
                            <a href="{{route('presentation-show')}}" class="text">
                                Présentation
                            </a>
                            <a href="{{route('partenaires-show')}}" class="text">
                                Partenaires
                            </a>
                            <a href="{{route('actualites-show')}}" class="text">
                                Actualité
                            </a>
                            <a href="#" class="text">
                                Résultat
                            </a>
                            <a href="{{route('adherer-show')}}" class="text">
                                Adhérer
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('contact-show')}}" class="lg nav-text">
                            Nous contacter
                        </a>
                    </li>
                </ul>
            </div>
            <a href="https://www.dondemoelleosseuse.fr/" class="lg nav-text border-bottom res-text">
                            Devenir donneur
            </a>
            <div class="menu-hamburger">
                <span class="bar-menu"></span>
                <span class="bar-menu"></span>
                <span class="bar-menu"></span>
            </div>
        </nav>        
    </header>
    
    <div class="blur-content"></div>

    <!-- // CONTAINER PAGE // -->
    @yield ('content')

    <!-- // BTN REMONTE SCROLL // -->
    <button id="btnRemonter" onclick="remonteurHaut()" class="text">
        <i class="ri-arrow-up-line"></i>
    </button> 

    <!-- // FOOTER // -->
    @section ('footer')      
        <footer class="footer">
            <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#f9f6f6" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,64C384,75,480,117,576,149.3C672,181,768,203,864,197.3C960,192,1056,160,1152,149.3C1248,139,1344,149,1392,154.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg> 
            <div class="row">
                <div class="footer-container logo-footer">
                    <a href="{{route('accueil-show')}}" class="logo-img-footer">
                        <img src="{{ asset ('FrontOffice/public/assets/img/logo/dark-logo.png') }}" alt="dark-logo"/>
                    </a>
                </div>
                <div class="footer-container">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{route('accueil-show')}}" class="text">Accueil</a></li>
                        <li><a href="{{route('temoignage-show')}}" class="text">Témoignages</a></li>
                        <li><a href="#" class="text">Actions</a></li>
                        <li><a href="{{route('don-moelle-osseuse-show')}}" class="text">Don de Moelle Osseuse</a></li>
                        <li><a href="#" class="text">Nous contacter</a></li>
                        <li><a href="https://www.dondemoelleosseuse.fr/" class="text">Devenir donneur</a></li>
                    </ul>
                </div>
                <div class="footer-container">
                    <h4>contacter nous</h4>
                    <ul>
                        <li><p class="text">56, Chemin des Montarmots</p></li>  
                        <li><p class="text">25000 BESANCON</p></li>
                    </ul>
                </div>
                <div class="footer-container">
                    <h4>Suivez-nous</h4>
                    <ul class="icon-footer">
                        <li><a href="https://www.facebook.com/EngagementLeucemie/"><i class="ri-facebook-fill"></i></a></li>
                        <li><a href="https://www.instagram.com/engagementleucemie/?hl=fr"><i class="ri-instagram-line"></i></a></li>
                        <li><a href="https://twitter.com/FLeucemie"><i class="ri-twitter-x-line"></i></a></li>
                        <li><a href="https://www.tiktok.com/@engagementleucemie"><i class="ri-tiktok-fill"></i></a></li>
                    </ul>
                </div>
            </div>
            <p style="font-size: .8em; color: var(--white-color); text-align:center; ">Designed by<a href="https://ethandelbos.com/" style="color: var(--white-color); font-weight:600;">EthanDelbos</a></p>
        </footer>
    @show

    <!-- // SWIPER JS // -->
    <script src="{{ asset('FrontOffice/public/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('FrontOffice/public/assets/js/slider.js') }}"></script> 

    <!-- // SCRIPT // -->
    <script src="{{ asset ('FrontOffice/public/assets/js/navbar.js') }}"></script>
    <script src="./assets/js/scroll-down.js"></script>
    <script src="{{ asset ('FrontOffice/public/assets/js/remonte_scroll.js') }}"></script>

    <!-- // SCROLLREVEAL // -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset ('FrontOffice/public/assets/js/scroll.js') }}"></script>

</body>
</html>