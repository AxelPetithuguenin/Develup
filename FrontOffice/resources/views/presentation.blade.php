@extends('template')

@section('content')

    <!-- // PRESENTATION PAGE // -->
    <section class="container-page">
        <div class="edito-president">
            <div class="edito-president-container">
                @foreach($bureau as $bureaux)
                    @if($bureaux->fonctions->contains('role', 'Président'))
                        <img src="{{ asset('BackOffice/public/storage/pdp/' . $bureaux->photo) }}" alt="Image du président de l'Association de Engagement Leucemie" class="personnal-temoignage-img borde-radius-img-presentation">
                    @endif
                @endforeach
            </div>

            <h3 class="middle-title" style="text-align: center; margin: 10px;">
                Edito du Président
            </h3>
            <div class="text-edito-container">
                <p class="text">
                    « Aidés par nos fidèles partenaires, soutenus par nos ambassadeurs au grand coeur, nous concentrons tous nos efforts pour inciter à l'inscription sur le registre « Don Volontaire de Moelle Osseuse ».
                    L'accompagnement des personnes porteuses de handicap est omniprésent dans notre histoire, nous continuons à participer aux grands événements comme L'Envolée Nordique ou la Transjurassienne.
                    Nous multiplions les actions et mettons tout en œuvre pour obtenir des résultats probants. Depuis le 01 janvier 21, l'âge des personnes souhaitant s'inscrire sur le registre doit être compris entre 18 et 35 ans (révolus).
                    Cette décision de l'Agence de Biomédecine, modifie profondément nos modes opératoires. Nous devons poursuivre et développer nos actions en direction de publics jeunes. Pour maintenir un niveau de recrutement permettant aux malades et à 
                    leur entourage de garder l'espoir et surtout de pouvoir bénéficier d'une greffe, nous avons grandement besoin de tous les acteurs proches de ces jeunes âgés de 18 à 35 ans. 
                    Nous comptons sur toutes et tous pour nous inviter dans les structures éducatives, les corps constitués, les entreprises, les associations, les manifestations sportives et culturelles... pour que nous puissions sensibiliser ce jeune public
                    Ensemble, nous pouvons relever le défi.Merci de votre aide. »Alex Chouffe - Président
                </p>
            </div>
        </div>
        <div class="autre-membre">
            <p class="text lg" style="font-weight: var(--medium-font-weight); letter-spacing: 2px;">
                Les membres du Bureau et du Conseil d'Administration
            </p>
            <div class="autre-membre-container">
                <div class="wrap">

                    @foreach($bureau as $bureaux)
                        <div class="presentation-box">
                            <div class="image-presentation-box">
                                <img src="{{ asset('BackOffice/public/storage/pdp/' . $bureaux->photo) }}" alt="{{ $bureaux->nom}}">
                            </div>
                            <div class="text-container-box-presentation">
                                <p class="text" style="font-weight: var(--medium-font-weight);">
                                    {{ $bureaux->prenom}} {{ $bureaux->nom }}
                                </p>
                                <p class="text role-bureau">
                                    @foreach($bureaux->fonctions as $fonction)
                                        {{ $fonction->role }}
                                        <br>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <p class="text" style="text-align: center;">
            Les comptes-rendus des Assemblées Générales Ordinaires 2021 et 2022 sont à consulter
            <a href="#" class="text link-here">ici</a>.
        </p>
    </section>

@stop