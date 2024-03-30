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
            <div class="box-image">
                <!-- Afficher les détails du partenaire -->
                <a href="{{ $partenaire->lien }}">
                    <img src="{{ asset($partenaire->logo_partenaire) }}" alt="Logo du partenaire">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop
