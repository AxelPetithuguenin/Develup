@extends('template')

@section('content')

<!-- // NOS PARTENAIRES // -->
<section class="container-page">
    <div class="header-page">
        <div class="header-page-container">
            <div class="header-title-container">
                <h3 class="middle-title">
                    Nos partenaires
                </h3>
            </div>
            <div class="header-text-container">
                <p class="text">
                    Pour en savoir plus sur notre partenaire engagé qui rend 
                    possible chacune de nos actions, cliquez sur l'image ci-dessous. 
                    Explorez leur engagement envers notre cause et la manière dont
                    ils contribuent à faire une différence significative.
                </p>
            </div>
        </div>
    </div>
    <div class="partenaire-container">
        <div class="wrap">
            @foreach($partenaires as $partenaire)
                <div class="card-box-image">
                    <div class="card-inner">

                        <!-- // FRONT // -->
                        <div class="card-front">
                            <img class="dashboard-image" src="{{ asset('BackOffice/public/storage/logos/' . $partenaire->logo_partenaire) }}" alt="{{ $partenaire->nom_partenaire }}">
                            <p class="text" style="text-align: center;">
                                {{ $partenaire->nom_partenaire }}
                            </p>
                        </div>

                        <!-- // BACK // -->
                        <div class="card-back">
                            <div class="card-back-container">
                                <div class="back-header-card-container">
                                    <div class="green-line"></div>
                                    <p class="text lg">
                                        Site-web
                                    </p>
                                    <div class="green-line"></div>
                                </div>
                                <a href="#" class="text">
                                    <span class="web_link text">
                                        Website
                                    </span>
                                </a>
                                <div class="back-header-card-container">
                                    <div class="green-line"></div>
                                    <p class="text lg">
                                        Réseaux Sociaux
                                    </p>
                                    <div class="green-line"></div>
                                </div>
                                <div class="social-netword-card-container">
                                    <div class="wrap">
                                        @foreach($partenaire->liens as $lien)
                                            <a href="{{ $lien->pivot->lien }}" target="_blank">
                                                <img src="{{ asset('BackOffice/public/storage/icone/' . $lien->icone) }}" alt="{{ $lien->nom }}" title="{{ $lien->nom }}" width="20" height="20">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop
