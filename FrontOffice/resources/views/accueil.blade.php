@extends('template')


@section('content')

    <!-- // PAGE ACCUEIL // -->
    <section class="landing-page-container">
        <div class="landing-page-top-container">
            <div class="landing-page-text-container">
                <div class="title-container-landing-page">
                    <h2 class="first-title dg">
                        Engagement
                    </h2>
                    <h1 class="second-title lg">
                        Leucémie
                    </h1>
                </div>
                <div class="button-devenir-donneur-container">
                    <a href="https://www.dondemoelleosseuse.fr/" class="btn btn-link text">
                        Devenir donneur
                    </a>
                </div>
            </div>
            <div class="landing-page-image-container">
                <div class="first-circle">
                    <div class="circle medium-circle"></div>
                </div>
                <div class="center-element">
                    <div class="circle big-circle"></div>
                    <img src="./assets/img/logo/heart.png" alt="heart-img" class="heart-image">
                    <div class="ring"></div>
                </div>
                <div class="end-circle">
                    <div class="top-end-circle">
                        <div class="circle small-circle small-circle-1"></div>
                    </div>
                    <div class="bottom-end-circle">
                        <div class="circle small-circle small-circle-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="landing-page-bottom-container">
            <div class="social-network-content">
                <div class="header-top-content">
                    <p class="text text-header-landing-page">
                        Réseaux sociaux
                    </p>
                    <div class="line-landing-page"></div>
                </div>
                <div class="bottom-container-content">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/EngagementLeucemie/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/engagementleucemie/?hl=fr">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/FLeucemie">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@engagementleucemie">
                                <i class="ri-tiktok-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="scroll">
                <div class="scroll-container lg"  onclick="scrollDown()">
                    <p class="scroll-text text">
                        SCROLL
                    </p>
                    <i class="ri-mouse-line"></i>
                    <div class="scroll-angle">
                        <i class="ri-arrow-down-s-line"></i>
                        <i class="ri-arrow-down-s-line"></i>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>
            <div class="nbre-inscrits-content">
                <div class="header-top-content">
                    <p class="text text-header-landing-page">
                        Nombres d’inscrits
                    </p>
                    <div class="line-landing-page"></div>
                </div>
                <div class="bottom-container-content">
                    <div class="bottom-container-content">
                        <span class="big-small-text" id="countdown"></span>
                        <p class="text">
                            Membres inscrits
                        </p>
                    </div>
                </div>
            </div>
        </div> 
    </section> 

    <!-- // SLIDER PROCHAINES ACTIONS // -->
    <section class="slider-temoignage" id="slider-temoignage">
        <h3 class="middle-title">Nos prochaines actions</h3>
        <hr>
        <div class="voir-plus-text-container">
            <a href="{{route('temoignage-show')}}" class="voir-plus text">Voir plus...</a>
        </div>
        <div class="card-container-temoignage swiper">
            <div class="card-content-prochaines-actions">
               <div class="swiper-wrapper">
               @foreach($temoignages as $temoignage)
                    <article class="card-temoignage-slider swiper-slide">
                        <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}" class="card-slider-image-link-temoignage">
                            <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="card-image"/>
                        </a>
                        <div class="card-text-container">
                            <p class="card-text-title text">
                                {{ implode(' ', array_slice(explode(' ', $temoignage->titre_temoignage), 0, 5)) }}
                            </p>
                            <p class="text">
                                <i class="ri-double-quotes-r lg"></i>
                                {{ implode(' ', array_slice(explode(' ', $temoignage->contenu_temoignage), 0, 4)) }}{{ str_word_count($temoignage->contenu_temoignage) > 5 ? '' : '' }}
                                <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}">
                                    <span class="voir-plus-text" style="color: var(--gray-color);">Lire plus...</span>
                                </a>
                            </p>
                        </div>
                    </article>
                @endforeach
               </div>
            </div>

            <!-- - BTN PREV / BTN NEXT -->
            <div class="swiper-button-next swiper-button-next-prochaines-actions">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev swiper-button-prev-prochaines-actions">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- // DOT // -->
            <div class="swiper-pagination swiper-pagination-prochaines-actions"></div>
         </div> 
    </section>


    <!-- // SLIDER ACTUALITE // -->
    <section class="slider-temoignage" id="slider-temoignage">
        <h3 class="middle-title">Actualité</h3>
        <hr>
        <div class="voir-plus-text-container">
            <a href="{{route('actualites-show')}}" class="voir-plus text">Voir plus...</a>
        </div>
        <div class="card-container-temoignage swiper">
            <div class="card-content-actualite">
               <div class="swiper-wrapper">
                    @foreach($actualites as $actualite) 
                        <article class="simple-card-actualite swiper-slide">
                            <div class="card-text-container-actu">
                                <p class="card-title">
                                    {{ $actualite->titre_actualite }}
                                </p>
                                <p class="text">
                                    {{ implode(' ', array_slice(explode(' ', $actualite->contenu_actualite), 0, 10)) }}
                                </p>
                                <div class="card-btn">
                                    <a href="{{ route('personnal_actualite', ['id' => $actualite->id]) }}" class="btn green-btn text">Voir plus</a>
                                </div>
                            </div>
                            <div class="card-image-part">
                            <a href="{{ route('personnal_actualite', ['id' => $actualite->id]) }}" class="card-image-link">
                                    <img src="../../../BackOffice/public/storage/{{ $actualite->image }}" alt="{{ $actualite->titre_actualite }}" class="image-card-actu"/>  
                                </a>
                            </div>
                        </article>
                    @endforeach
               </div>
            </div>

            <!-- - BTN PREV / BTN NEXT -->
            <div class="swiper-button-next swiper-button-next-actualite">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev swiper-button-prev-actualite">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- // DOT // -->
            <div class="swiper-pagination swiper-pagination-actualite"></div>
         </div> 
    </section>


    <!-- // DEVENIR DONNEUR ALERT MESSAGE // -->
    <section class="message" id="message">
        <div class="message-text-container">
            <h4 class="small-big-text" style="color: var(--white-color); letter-spacing: 1.5px;">
                <i class="ri-bard-line dg"></i>
                La force de donner, le pouvoir de guérir.
            </h4>
            <p class="text text-spacing" style="color: var(--white-color);">
                Plus de <span class="nunber dg">475</span> personnes ontdéjà répondu à l'appel. 
                eur geste héroïque a donné un nouvel élan à ceux qui luttaient contre la maladie. 
                En nous rejoignant, vous devenez une lueur d'espoir pour ceux qui attendent leur miracle.
            </p>
            <a href="#" class="btn btn-link btn-animation-boom text btn-border-dg dg" style="border: 2px solid var(--dark-green);">Devenir donneur</a>
        </div>
        <div class="compter-container">
            <h1 class="number-compter">475</h1>
            <h4 class="title-annonce">Membres</h4>
            <div class="orange-shadow"></div>
        </div>
    </section>


    <!-- // SLIDER TEMOIGNAGE // -->
    <section class="slider-temoignage" id="slider-temoignage">
        <h3 class="middle-title">Nos témoignages</h3>
        <hr>
        <div class="voir-plus-text-container">
            <a href="{{route('temoignage-show')}}" class="voir-plus text">Voir plus...</a>
        </div>
        <div class="card-container-temoignage swiper">
            <div class="card-content-temoignage">
               <div class="swiper-wrapper">
               @foreach($temoignages as $temoignage)
                    <article class="card-temoignage-slider swiper-slide">
                        <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}" class="card-slider-image-link-temoignage">
                            <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="card-image"/>
                        </a>
                        <div class="card-text-container">
                            <p class="card-text-title text">
                                {{ implode(' ', array_slice(explode(' ', $temoignage->titre_temoignage), 0, 5)) }}
                            </p>
                            <p class="text">
                                <i class="ri-double-quotes-r lg"></i>
                                {{ implode(' ', array_slice(explode(' ', $temoignage->contenu_temoignage), 0, 4)) }}{{ str_word_count($temoignage->contenu_temoignage) > 5 ? '' : '' }}
                                <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}">
                                    <span class="voir-plus-text" style="color: var(--gray-color);">Lire plus...</span>
                                </a>
                            </p>
                        </div>
                    </article>
                @endforeach
               </div>
            </div>

            <!-- - BTN PREV / BTN NEXT -->
            <div class="swiper-button-next swiper-button-next-temoignage">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev swiper-button-prev-temoignage">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- // DOT // -->
            <div class="swiper-pagination swiper-pagination-temoignage"></div>
         </div> 
    </section>

    
    <!-- // SCRIPT // -->
    <!-- // COMPTE A REBOURS DES INSCRITS // -->
    <script>
        // Compte à rebours
        let count = 207; // Nombre de départ
        const countdownElement = document.getElementById('countdown');
                
        const countdownInterval = setInterval(() => {
        count++;
        countdownElement.textContent = count;
        
        // Limites qu'on veut attentre
        if (count === 217) {
            clearInterval(countdownInterval);
        }
        }, 100);
    </script>
@stop
