@extends('template')

@section('content')

<!-- // NOS PARTENAIRES // -->
<section class="container-page">
    <div class="header-page">
        <div class="header-page-container">
            <div class="header-title-container">
                <h3 class="middle-title">
                    Nos Actualite
                </h3>
            </div>
            <div class="header-text-container">
                <p class="text">
                    Vous pouvez suivre toutes les dernières actualitées de l'associoation ici-même. 
                </p>
            </div>
        </div>
    </div>

    <!-- // ACTUALITE //-->
    <section class="actualite" id="actualite">
        <h2 class="middle-title">Actualité</h2>
        <hr style="width: 5%;">
        <div class="prochaines-actions-content">
            <div class="slider-prochaines-actions swiper">
                <div class="slider-actualite-container">
                    <a href="#" class="voir-plus text">Voir plus...</a>
                    <div class="swiper-wrapper">

                    @foreach($actualites as $actualite)        
                        <article class="card-prochaines-actions swiper-slide">
                            <div class="card-prochaines-actions-description">
                                <div class="card-text">
                                    <p class="card-title">
                                    {{ $actualite->titre_actualite }}
                                    </p>
                                    <p class="text">
                                    {{ $actualite->contenu_actualite }}
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="card-swiper-image">
                                
                                <img src="{{ asset('BackOffice/public/storage/image/' . $actualite->image_actualite) }}" alt="{{ $actualite->titre_actualite }}"/>
                                
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

            
        </div>
    </div>
</section>

@stop
