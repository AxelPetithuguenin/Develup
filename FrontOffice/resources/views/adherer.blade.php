@extends('template')

@section('content')

    <!-- // ADHERENT PAGE // -->
    <section class="container-page">

        <div class="header-page">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Soutenez l'association devenez adhérent
                    </h3>
                </div>
                <div class="header-text-container">
                    <p class="text">
                        Bienvenue dans notre espace dédié aux témoignages, une collection de 
                        récits authentiques qui racontent le pouvoir transformateur du don de 
                        moelle osseuse. Ces histoires sont les voix vibrantes de courage, de
                        résilience et d'espoir qui émanent de ceux qui ont généreusement 
                        partagé ce cadeau précieux. 
                    </p>
                </div>
            </div>
        </div>
        
        <!-- // MESSAGE SUCCES // -->
        @if(session('success'))
            <div class="message-succes-dashboard">
                <div class="message-succes-container">
                    <div class="text">
                        <i class="ri-bard-line lg"></i>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        
        <!-- // FORMULAIRE ADHERENT // -->
        <form action="{{ route('adherer-store') }}" method="post" class="form-adherent">
        @csrf

            <!-- // HEADER FORM // -->
            <div class="header-form">
                <p class="text" style="font-weight: var(--medium-font-weight);">
                    Rejoignez-nous, paiement par chèque à : 
                </p>
                <p class="text" style="font-weight: var(--normal-font-weight);">
                    Engagement Leucémie 56, Chemin des Montarmots 25000 BESANCON
                </p>
            </div>  

            <!-- // LABEL NOM  // -->
            <div class="form-group">
                <label for="nom" class="text label-dashboard">Nom</label>
                <input type="text" class="input-box text" name="nom" id="nom" value="{{ old('nom') }}"/>
                @error('nom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL PRENOM  // -->
            <div class="form-group">
                <label for="prenom" class="text label-dashboard">Prénom</label>
                <input type="text" class="input-box text" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                @error('prenom')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // LABEL EMAIL  // -->
            <div class="form-group">
                <label for="email" class="text label-dashboard">E-mail</label>
                <input type="email" class="input-box text" name="email" id="email" value="{{ old('email') }}"/>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
            <div style="margin: 50px 0 25px 0;" class="wrap">
                <button type="submit" class="btn green-btn text">
                    Adhérer
                    <i class="ri-send-plane-2-fill icone"></i>
                </button>
            </div>

        </form>

        <!-- // SECTION // -->
        <div class="adherent-other-section">
            <h3 class="middle-title">
                Soutenez l'association devenez adhérent
            </h3>

            <!-- // SLIDER // -->
            <div class="slider-adherent">
                <div class="card-container swiper">
                    <div class="card-content">
                        <div class="swiper-wrapper">

                            <article class="card-adherent swiper-slide">
                                <i class="ri-draft-line lg icone-adherent"></i>
                                <p class="text">
                                    Réaliser des actions de recrutement pour inscrire un maximum de personnes sur le registre 
                                    « Don Volontaire de Moelle Osseuse » (DVMO)
                                </p>
                            </article>

                            <article class="card-adherent swiper-slide">
                                <i class="ri-group-line lg icone-adherent"></i>
                                <p class="text">
                                    Organiser des séances de formation des bénévoles
                                </p>
                            </article>

                            <article class="card-adherent swiper-slide">
                                <i class="ri-megaphone-line lg icone-adherent"></i>
                                <p class="text">
                                    Intervenir pour sensibiliser dans les milieux éducatifs (écoles, collèges, Lycées…), 
                                    les entreprises, lors de manifestations sportives & culturelles…
                                </p>
                            </article>
                                        
                            <article class="card-adherent swiper-slide">
                                <i class="ri-organization-chart lg icone-adherent"></i>
                                <p class="text">
                                    Assurer l’intendance des actions (accueil, logistique, restauration…)
                                </p>
                            </article>

                            <article class="card-adherent swiper-slide">
                                <i class="ri-service-fill lg icone-adherent"></i>
                                <p class="text">
                                    Ou tout simplement soutenir l’association…
                                </p>
                            </article>

                        </div>
                    </div>
                    
                    <!-- // DOT // -->
                    <div class="dot-container">
                        <div class="swiper-pagination-adherent"></div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
@stop
