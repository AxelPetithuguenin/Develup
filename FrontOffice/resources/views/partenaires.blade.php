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
        <p class="text" style="position:relative; margin-top:25px; text-align:center;">
            <i class="ri-refresh-line lg"></i>
            Découvrez les sites de nos partenaires en un clin d'œil ! Survolez nos cartes pour voir leurs sites grâce à notre animation flip.
        </p>
    </div>
    <div class="partenaire-container">
        <div class="wrap">
            @foreach($partenaires as $partenaire)
                <div class="card-box-image">
                    <div class="card-inner">

                        <!-- // FRONT // -->
                        <div class="card-front">
                            <img class="card-image-logo" src="{{ asset('BackOffice/public/storage/logos/' . $partenaire->logo_partenaire) }}" alt="{{ $partenaire->nom_partenaire }}">
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
                                        Réseaux Sociaux
                                    </p>
                                    <div class="green-line"></div>
                                </div>
                                <div class="social-netword-card-container">
                                    <div class="wrap">
                                        @foreach($partenaire->liens as $lien)
                                            <a href="{{ $lien->pivot->lien }}" target="_blank" class="icone-partenaire">
                                                <img src="{{ asset('BackOffice/public/storage/icone/' . $lien->icone) }}" alt="{{ $lien->nom }}" class="icone-card-partenaire">
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

    <!-- // PAGINATION // -->
     <div class="pagination">
        <div class="pagination-container">
            @if ($partenaires->onFirstPage())
                <div class="pagination-btn pagination-icon-btn text disabled">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
            @else
                <a href="{{ $partenaires->previousPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                </a>
            @endif

            @foreach ($partenaires->getUrlRange(1, $partenaires->lastPage()) as $page => $url)
                <div class="pagination-btn">
                    <a href="{{ $url }}" class="pagination-number-btn text dg {{ $partenaires->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </div>
            @endforeach

            @if ($partenaires->hasMorePages())
                <a href="{{ $partenaires->nextPageUrl() }}">
                    <div class="pagination-btn pagination-icon-btn text">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </a>
            @else
                <div class="pagination-btn pagination-icon-btn text disabled">
                    <i class="ri-arrow-right-s-line"></i>
                </div>
            @endif
            </div>
        </div>
    </section>

    <style>
        .disabled{
            background-color: var(--primary-color);
            color: var(--white-color) !important;
        }
    </style>

@stop
