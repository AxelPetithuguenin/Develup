@extends('template')

@section('content')

    <!-- // PERSONNAL TEMOIGNAGE PAGE // -->
    <section class="container-page">
        <div class="header-personnal-temoignage-page-content">
            <div class="personnal-temoignage-image-container">
                <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="personnal-temoignage-img"/>
            </div>
            <div class="temoigngage-header-text">
                <p class="text" style="color: var(--gray-color);"> 
                    {{ $temoignage->prenom_temoignage }},
                    {{ \Carbon\Carbon::parse($temoignage->date_temoignage)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY') }}
                </p>
                <h3 class="middle-title" style="text-align: justify;">
                    {{ $temoignage->titre_temoignage }}
                </h3>
            </div>
        </div>
        <div class="personnal-temoignage-text">
            <i class="ri-double-quotes-r lg"></i>
            <textarea class="text dg paragraphe-text text-container-temoignage" readonly> 
                {{ $temoignage->contenu_temoignage }} 
            </textarea>
        </div>    
    </section>

@stop
    