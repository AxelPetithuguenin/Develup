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
                <div class="box-image">
                    <a href="https://www.constructions-chauvin.fr/">
                        <img src="assets/img/partenaires/Chauvin.png" alt="image de nos partenaires">
                    </a>
                </div>

                <div class="box-image">
                    <a href="https://www.credit-agricole.fr/ca-franchecomte/particulier/agence/franche-comte.html/">
                        <img src="assets/img/partenaires/Credit-Agricole.png" alt="image de nos partenaires">
                    </a>
                </div>

                <div class="box-image">
                    <a href="https://www.diager-industrie.com/">
                        <img src="assets/img/partenaires/Diager.png" alt="image de nos partenaires">
                    </a>
                </div>
            </div>
        </div>
    </section>

@stop