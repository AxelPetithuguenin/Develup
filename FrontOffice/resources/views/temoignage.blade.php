@extends('template')


@section('content')

    <!-- // TEMOIGNAGE PAGE // -->
    <section class="container-page">
        
        <div class="header-page">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Ils sont vécu la maladie, ils témoignent
                    </h3>
                </div>
                <div class="header-text-container">
                    <p class="text">
                        Bienvenue dans notre espace dédié aux témoignages, une collection de 
                        récits authentiques qui racontent le pouvoir transformateur du don de 
                        moelle osseuse. Ces histoires sont les voix vibrantes de courage, de
                        résilience et d'espoir qui émanent de ceux qui ont généreusement 
                        partagé ce cadeau précieux. 
                    </p>
                </div>
            </div>
        </div>
        
        <div class="temoignage-card-container">
            <div class="wrap">

                @foreach($temoignages as $temoignage)
                    <article class="card-temoignage-page">
                        <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}" class="card-slider-image-link-temoignage">
                            <img src="{{ asset('BackOffice/public/storage/image_temoignage/' . $temoignage->image_temoignage) }}" class="card-image"/>
                        </a>
                        <div class="card-text-container">
                            <p class="card-text-title text">
                                {{ implode(' ', array_slice(explode(' ', $temoignage->titre_temoignage), 0, 5)) }}
                            </p>
                            <p class="text">
                                <i class="ri-double-quotes-r lg"></i>
                                {{ implode(' ', array_slice(explode(' ', $temoignage->contenu_temoignage), 0, 4)) }}{{ str_word_count($temoignage->contenu_temoignage) > 5 ? '' : '' }}
                                <a href="{{ route('personnal_temoignage', ['id' => $temoignage->id]) }}">
                                    <span class="voir-plus-text" style="color: var(--gray-color);">Lire plus...</span>
                                </a>
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- // PAGINATION // -->
            <div class="pagination">
                <div class="pagination-container">
                    @if ($temoignages->onFirstPage())
                        <div class="pagination-btn pagination-icon-btn text disabled">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>
                    @else
                        <a href="{{ $temoignages->previousPageUrl() }}">
                            <div class="pagination-btn pagination-icon-btn text">
                                <i class="ri-arrow-left-s-line"></i>
                            </div>
                        </a>
                    @endif

                    @foreach ($temoignages->getUrlRange(1, $temoignages->lastPage()) as $page => $url)
                        <div class="pagination-btn">
                            <a href="{{ $url }}" class="pagination-number-btn text dg {{ $temoignages->currentPage() == $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        </div>
                    @endforeach

                    @if ($temoignages->hasMorePages())
                        <div class="pagination-btn pagination-icon-btn text">
                            <a href="{{ $temoignages->nextPageUrl() }}">
                                <i class="ri-arrow-right-s-line"></i>
                            </a>
                        </div>
                    @else
                        <a href="{{ $temoignages    ->nextPageUrl() }}">
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
