@extends('template')

@section('content')

    <!-- // PERSONNAL TEMOIGNAGE PAGE // -->
    <section class="container-page">
        <div class="header-personnal-temoignage-page-content">
            <div class="personnal-temoignage-image-container">
                <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="personnal-temoignage-img"/>
            </div>
            <h3 class="middle-title" style="text-align: justify;">
                {{ $temoignage->titre_temoignage }}
            </h3>
        </div>
        <div class="personnal-temoignage-text">
            <p class="text dg paragraphe-text">
                {{ $temoignage->contenu_temoignage }} 
            </p>
        </div>      
    </section>

@stop
