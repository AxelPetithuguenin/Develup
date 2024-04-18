@extends('template')

@section('content')

    <!-- // PERSONNAL ACTUALITE PAGE // -->
    <section class="container-page">
        <div class="header-personnal-actualite">
            <h3 class="middle-title">
                {{ $actualites->titre_actualite }}
            </h3>  
            <p class="text" style="color: var(--gray-color);">
                {{ $actualites->_date_actualite }}
            </p>
        </div>
        <div class="personnal-actualite-container">
            <div class="img-personnal-container">
                <img src="../../../BackOffice/public/storage/{{ $actualites->image }}" alt="{{ $actualites->titre_actualite }}"/>  
            </div>
            <textarea class="text dg paragraphe-text text-container-temoignage" readonly>
                {{ $actualites->contenu_actualite }} 
            </textarea>
        </div>
    </section>

@stop
    