@extends('template')

@section('content')



    <!-- // ACTUALITE //-->
    <section class="actualite" id="actualite">
        <h2 class="middle-title">Actualité</h2>
        <hr style="width: 5%;">
        <div class="prochaines-actions-content">
            <div class="slider-prochaines-actions swiper">
                <div class="slider-actualite-container">
                @foreach($actualites as $actualite) 
                    <a href="#" class="voir-plus text">Voir plus...</a>
                    <div class="swiper-wrapper">

                          
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
                                
                                <img src="../../../BackOffice/public/storage/{{ $actualite->image }}" alt="{{ $actualite->titre_actualite }}"/>
                                
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

            
        </div>
    </div>
</section>

@stop
