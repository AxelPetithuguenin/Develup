@extends('template')

@section('content')

    <!-- // ACTUALITE //-->
    <section class="container-page">

        <div class="header-page">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Notre Actualité
                    </h3>
                </div>
                <div class="header-text-container">
                    <p class="text">
                        De nombreuses actions d'information, de sensibilisation et d'incitation à 
                        l'inscription sur le registre Don Volontaire de Moelle Osseuse sont prévues.
                        Vous pouvez en prendre connaissance ci-dessous.
                    </p>
                    <p class="text" style="position: relative; margin-top: 25px;">
                        Si vous aussi vous souhaitez bénéficier d'une intervention des bénévoles de l'association, 
                        n'hésitez pas à nous en faire part. Si vous souhaitez rejoindre nos bénévoles pour oeuvrer 
                        au sein de l'association, vous êtes bienvenus, nous avons besoin du plus grand nombre. 
                    </p>
                    <div class="actu-link-contact">
                        <a href="{{route('contact-show')}}" class="text lg">
                            Nous contacter
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="actualite-card-container">
            @foreach($actualites as $actualite) 
                <article class="simple-card-actualite">
                    <div class="card-text-container-actu">
                        <p class="card-title">
                            {{ $actualite->titre_actualite }}
                        </p>
                        <p class="text">
                            {{ implode(' ', array_slice(explode(' ', $actualite->contenu_actualite), 0, 10)) }}
                        </p>
                        <div class="card-btn">
                            <a href="{{ route('personnal_actualite', ['id' => $actualite->id]) }}" class="btn green-btn text">Voir plus</a>
                        </div>
                    </div>
                    <div class="card-image-part">
                        <a href="{{ route('personnal_actualite', ['id' => $actualite->id]) }}" class="card-image-link">
                            <img src="../../../BackOffice/public/storage/{{ $actualite->image }}" alt="{{ $actualite->titre_actualite }}" class="image-card-actu"/>  
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- // PAGINATION // -->
        <div class="pagination">
            <div class="pagination-container">
                @if ($actualites->onFirstPage())
                    <div class="pagination-btn pagination-icon-btn text disabled">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                @else
                    <a href="{{ $actualites->previousPageUrl() }}">
                        <div class="pagination-btn pagination-icon-btn text">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>
                    </a>
                @endif
                @foreach ($actualites->getUrlRange(1, $actualites->lastPage()) as $page => $url)
                    <div class="pagination-btn">
                        <a href="{{ $url }}" class="pagination-number-btn text dg {{ $actualites->currentPage() == $page ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    </div>
                @endforeach
                @if ($actualites->hasMorePages())
                    <div class="pagination-btn pagination-icon-btn text">
                        <a href="{{ $actualites->nextPageUrl() }}">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                @else
                    <a href="{{ $actualites->nextPageUrl() }}">
                        <div class="pagination-btn pagination-icon-btn text">
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
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
