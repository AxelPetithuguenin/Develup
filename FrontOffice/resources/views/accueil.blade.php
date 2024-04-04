@extends('template')


@section('content')
    <!-- // PAGE ACCUEIL // -->
    <section class="accueil" id="accueil">
        <div class="accueil-text">
            <div class="accueil-text-container">               
                <div class="green-shape">
                    <div class="green-shape-container">
                        <h2 class="medium-text" id="countdown">475</h2>
                        <h4 class="small-big-text">Inscrits</h4>
                    </div>
                </div>
                <div class="accueil-title">
                    <div class="accueil-title-text">
                        <h1 class="first-title dg">ENGAGEMENT</h1>
                        <h1 class="second-title lg">LEUCEMIE</h1>
                    </div>
                </div>   
                <div class="accueil-text-content">
                    <h4 class="small-big-text small-title-accueil-content">
                        <i class="ri-bard-line lg"></i>
                        La force de donner, le pouvoir de guérir.
                    </h4>
                    <p class="text">
                        Plus de <span class="lg" style="font-weight: var(--medium-font-weight);">475</span> personnes ontdéjà répondu à l'appel. 
                        eur geste héroïque a donné un nouvel élan à ceux qui luttaient contre la maladie. 
                        En nous rejoignant, vous devenez une lueur d'espoir pour ceux qui attendent leur miracle.
                    </p>
                </div>
                <a href="#" class="btn btn-link btn-animation-boom text">Devenir donneur</a>
            </div>
        </div>
        <div class="scroll">
            <div class="scroll-container lg"  onclick="scrollDown()">
                <p class="scroll-text text">SCROLL</p>
                <i class="ri-mouse-line"></i>
                <div class="scroll-angle">
                    <i class="ri-arrow-down-s-line"></i>
                    <i class="ri-arrow-down-s-line"></i>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- // PROCHAINES ACTIONS // -->
    <section class="prochaines-actions" id="prochaines-actions">
        <h3 class="middle-title">Nos prochaines actions</h3>
        <hr>
        <div class="prochaines-actions-content">
            <div class="slider-prochaines-actions swiper">
                <div class="slider-prochaines-actions-container">
                    <a href="#" class="voir-plus text">Voir plus...</a>
                    <div class="swiper-wrapper">

                        <article class="card-prochaines-actions swiper-slide">
                            <div class="card-prochaines-actions-description">
                                <div class="card-text">
                                    <p class="card-title">
                                        Annonce Spéciale pour la Saison de Don et d'Espoir !
                                    </p>
                                    <p class="text" style="text-align: justify;">
                                        En cette saison festive de partage et d'amour, nous sommes ravis de vous annoncer 
                                        un événement très spécial qui illuminera les cœurs et sauvera des vies : notre campagne 
                                        de don de moelle osseuse pour Noël.
                                    </p>
                                    <div class="card-btn">
                                        <a href="#" class="btn green-btn text">Voir plus</a>
                                    </div>
                                </div>
                                <div class="card-information">
                                    <p class="slider-information-place text">
                                        Information : 
                                    </p>
                                    <div class="slider-hour-place text">
                                        <p>22 /12 - 23 /12</p>
                                        <p>Place Nationale 39100 Dole</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-swiper-image">
                                <a href="#" class="card-slider-image-link">
                                    <img src="./assets/img/logo/img-test.png" alt="project-image">
                                </a>
                            </div>
                        </article>

                        <article class="card-prochaines-actions swiper-slide">
                            <div class="card-prochaines-actions-description">
                                <div class="card-text">
                                    <p class="card-title">
                                        Annonce Spéciale pour la Saison de Don et d'Espoir !
                                    </p>
                                    <p class="text" style="text-align: justify;">
                                        En cette saison festive de partage et d'amour, nous sommes ravis de vous annoncer 
                                        un événement très spécial qui illuminera les cœurs et sauvera des vies : notre campagne 
                                        de don de moelle osseuse pour Noël.
                                    </p>
                                    <div class="card-btn">
                                        <a href="#" class="btn green-btn text">Voir plus</a>
                                    </div>
                                </div>
                                <div class="card-information">
                                    <p class="slider-information-place text">
                                        Information : 
                                    </p>
                                    <div class="slider-hour-place text">
                                        <p>22 /12 - 23 /12</p>
                                        <p>Place Nationale 39100 Dole</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-swiper-image">
                                <a href="#" class="card-slider-image-link">
                                    <img src="./assets/img/logo/img-test.png" alt="project-image">
                                </a>
                            </div>
                        </article>

                        <article class="card-prochaines-actions swiper-slide">
                            <div class="card-prochaines-actions-description">
                                <div class="card-text">
                                    <p class="card-title">
                                        Annonce Spéciale pour la Saison de Don et d'Espoir !
                                    </p>
                                    <p class="text" style="text-align: justify;">
                                        En cette saison festive de partage et d'amour, nous sommes ravis de vous annoncer 
                                        un événement très spécial qui illuminera les cœurs et sauvera des vies : notre campagne 
                                        de don de moelle osseuse pour Noël.
                                    </p>
                                    <div class="card-btn">
                                        <a href="#" class="btn green-btn text">Voir plus</a>
                                    </div>
                                </div>
                                <div class="card-information">
                                    <p class="slider-information-place text">
                                        Information : 
                                    </p>
                                    <div class="slider-hour-place text">
                                        <p>22 /12 - 23 /12</p>
                                        <p>Place Nationale 39100 Dole</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-swiper-image">
                                <a href="#" class="card-slider-image-link">
                                    <img src="./assets/img/logo/img-test.png" alt="project-image">
                                </a>
                            </div>
                        </article>
                        
                    </div>
                </div>
    
                <!-- // NEXT - PREV BTN // -->
                <div class="swiper-button-next-prochaine-action swiper-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>
    
                <div class="swiper-button-prev-prochaine-action swiper-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
    
                <!-- // DOT // -->
                <div class="swiper-pagination-prochaine-action swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- // ACTUALITE //-->
    <section class="actualite" id="actualite">
        <h2 class="middle-title">Actualité</h2>
        <hr style="width: 5%;">
        <div class="prochaines-actions-content">
            <div class="slider-prochaines-actions swiper">
                <div class="slider-actualite-container">
                    <a href="#" class="voir-plus text">Voir plus...</a>
                    <div class="swiper-wrapper">
                            
                        <article class="card-prochaines-actions swiper-slide">
                            <div class="card-prochaines-actions-description">
                                <div class="card-text">
                                    <p class="card-title">
                                        Annonce Spéciale pour la Saison de Don et d'Espoir !
                                    </p>
                                    <p class="text">
                                        En cette saison festive de partage et d'amour, nous sommes ravis de vous annoncer 
                                        un événement très spécial qui illuminera les cœurs et sauvera des vies : notre campagne 
                                        de don de moelle osseuse pour Noël.
                                    </p>
                                    <div class="info-supp">
                                        <div class="card-btn">
                                            <a href="#" class="btn green-btn text">Voir plus</a>
                                        <div class="nbre-inscrits-container">
                                            <p class="text">Inscrits</p>
                                            <div class="nbre-inscrits">
                                                <p class="text" style="color: var(--white-color);">15</p>
                                                <img src="./assets/img/logo//green-shape.png" alt="green-shape"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-swiper-image">
                                <a href="#" class="card-slider-image-link">
                                    <img src="./assets/img/logo/img-test.png" alt="project-image">
                                </a>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- // NEXT - PREV BTN // -->
                <div class="swiper-button-next-actualite swiper-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>

                <div class="swiper-button-prev-actualite swiper-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>

                <!-- // DOT // -->
                <div class="swiper-pagination-actualite swiper-pagination"></div>
            </div>
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

    <!-- // TEMOIGNAGES // -->
    <section class="temoignage" id="temoignage">
        <h2 class="middle-title">Témoignages</h2>
        <hr style="width: 7%;">
        <div class="temoignage-content">
            <div class="slider-temoignage swiper">
                <div class="slider-temoignage-container">
                    <a href="{{ route('temoignage-show') }}" class="voir-plus text">Voir plus...</a>
                    <div class="swiper-wrapper">
                        @foreach($temoignages as $temoignage)
                        <article class="card-temoignage-page swiper-slide">
                            <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}" class="card-slider-image-link-temoignage">
                                <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="card-image" />
                            </a>
                            <div class="card-text-container">
                                <p class="card-text-title text">
                                    {{ $temoignage->titre_temoignage }}
                                </p>
                                <p class="text">
                                    <i class="ri-double-quotes-r lg"></i>
                                    {{ implode(' ', array_slice(explode(' ', $temoignage->contenu_temoignage), 0, 5)) }}{{ str_word_count($temoignage->contenu_temoignage) > 5 ? '...' : '' }}
                                    <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}">
                                        <span class="voir-plus-text" style="color: var(--gray-color);">Lire plus...</span>
                                    </a>
                                </p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <!-- // NEXT - PREV BTN // -->
                <div class="swiper-button-next-temoignage swiper-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>

                <div class="swiper-button-prev-temoignage swiper-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>

                <!-- // DOT // -->
                <div class="swiper-pagination-temoignage swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- // SCRIPT // -->
        <script>
            // Compte à rebours
            let count = 460 ; // Nombre d'isncrits au total
            const countdownElement = document.getElementById('countdown');
                
            const countdownInterval = setInterval(() => {
                count++;
                countdownElement.textContent = count;
        
                // Limites qu'on veut attentre
                if (count === 475) {
                    clearInterval(countdownInterval);
                }
            }, 100); // Mettez la valeur en millisecondes que vous souhaitez pour la mise à jour du compte à rebours
        </script>
@stop
