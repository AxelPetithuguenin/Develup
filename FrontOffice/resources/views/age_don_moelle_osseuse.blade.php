@extends('template')


@section('content')

    <!-- // POURQUOI ENTRE 18 ET 35 ANS //  -->
    <section class="container-page">
        
        <div class="paragraphe-text">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Pourquoi une limite d’âge ?
                    </h3>
                </div>
                <div class="header-text-container">
                    <p class="text">
                        L'âge de recrutement pour s'inscrire sur le registre DVMO en France a été modifié le 1er janvier 2021 
                        (18 à moins de 36 ans au lieu de 18 à 51 ans).
                    </p>
                </div>
            </div>
        </div>
        <div class="personnal-temoignage-text">

            <div class="video-container">
                <iframe src="https://youtu.be/aWKhxz87pLk" alt="video-explication-don-de-moelle-osseuse" class="simple-video"></iframe>
            </div>

            <!-- // TABLE // -->
            <table class="table">
                <thead class="thead">
                    <tr class="text">
                        <td>Limites d’âges</td>
                        <td>Site Web</td>
                        <td>Nbre Inscrit</td>
                        <td>Date de création</td>
                        <td>Date de création</td>
                        <td>Entité légale</td>
                    </tr>
                </thead>
                <tbody class="tbody text">
                    <tr>
                        <th>National Marrow Donor Program/ Be The Match (Etat-Unis)</th>
                        <td>18-44 ans</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Gift of Life (Etat-Unis)</th>
                    </tr>
                    <tr>
                        <th>DKMS US (Etat-Unis)</th>
                    </tr>
                    <tr>
                        <th>Registre de donneurs de moelle osseuse de la Fondation Josep Carreras [REDMO] (Espagne)</th>  
                    </tr>
                    <tr>
                        <th>Registre de donneur de moelle osseuse (Italie)</th>
                    </tr>
                    <tr>
                        <th>DKMS (Allemagne)</th>
                    </tr>
                    <tr>
                        <th>Anthony Nolan (Royaume Uni)</th>
                    </tr>
                    <tr>
                        <th>British Bone Marrow Registry [BBMR] (Royaume Uni)</th>
                    </tr>
                    <tr>
                        <th>Welsh Bone Marrow Donor Registry</th>
                    </tr>
                    <tr>
                        <th>DKMS UK (Royaume Uni)</th>
                    </tr>
                    <tr>
                        <th>DKMS Polska(Pologne)</th>
                    </tr>
                </tbody>
            </table>

            <!-- // CONTAINER // -->
            <div class="header-page-container">
                <h3 class="middle-title title-center">
                    Quel est l'argumentaire développé par l'Agence de Biomédecine ?
                </h3>
            </div>
            <div class="paragraphe-text">
                <p class="paragraphe-title-orange text" style="margin: 50px 0 15px;"></p>
                    L'âge de recrutement pour s'inscrire sur le registre DVMO en France a été modifié 
                    le 1er janvier 2021 (18 à moins de 36 ans au lieu de 18 à 51 ans).
                </p>
                <p class="text">
                    <ul class="liste">
                        <li class="text liste">
                            Plus de 70% des donneurs prélevés ont moins de 35 ans
                        </li>
                        <li class="text liste">
                            Les moins de 35 ans, et idéalement les hommes, présentent un meilleur profil de donneurs 
                            (car les greffons de moelle osseuse sont plus riches en cellules souches 
                            et permettent donc aux patients une prise de greffe plus rapide).
                        </li>
                        <li class="text liste">
                            Un donneur est contacté en médiane 8 ans après son inscription. Sachant qu'un donneur 
                            peut être prélevé jusqu'à ses 60 ans révolus, plus un donneur s'inscrit jeune, 
                            plus il reste longtemps sur le registre et plus il a de chance d'être sollicité.
                        </li>
                    </ul>
                </p>
            </div>

            <div class="paragraphe-text">
                <p class="paragraphe-title-orange text" style="margin: 50px 0 15px;">
                    Lors de la recherche d’un donneur de moelle osseuse pour un malade, le premier critère est 
                    la parfaite compatibilité HLA entre le donneur et le receveur. L’âge du donneur prévaut-il sur cette compatibilité ?
                </p>
                <p class="text">
                    Non. La compatibilité HLA reste le premier et principal critère dans le choix du donneur. Et c'est pour cette raison 
                    qu'il est important également d'inscrire des jeunes donneurs qui apportent une diversité génétique au registre français. 
                    Cependant, l’âge puis le sexe sont également des critères importants dans le choix du donneur, lorsqu’un choix est possible 
                    entre plusieurs profils.
                </p>
            </div>

            <div class="paragraphe-text">
                <p class="paragraphe-title-orange text" style="margin: 50px 0 15px;">
                    Alors que depuis des années on dit que la compatibilité est extrêmement rare, pourquoi ne pas inscrire aussi les plus de 
                    35 ans pour offrir plus de chances de greffes ?
                </p>
                <p class="text">
                    La probabilité moyenne d’identifier, pour un patient, un donneur de moelle osseuse compatible en situation non apparentée varie 
                    énormément selon la fréquence des caractéristiques HLA des patients pour lesquels une indication de greffe a été posée. Plus les 
                    patients ont un typage HLA fréquent, donc très bien représenté dans la population, plus il sera facile de trouver un donneur compatible.
                    La probabilité peut alors être d’1 chance sur 1000. 
                </p>
                <p class="text paragraphe-text" style="margin: 50px 0 15px;">
                    Plus leur typage est rare, voire très rare (lié à l’histoire génétique, et donc aux origines sur plusieurs générations, de ces patients), 
                    plus il sera compliqué d’identifier un donneur, la probabilité pouvant alors tomber à 1 chance sur 10 millions voire plus.
                </p>
                <p class="text">
                    Dans tous les cas, il est nécessaire qu’un donneur présentant exactement les mêmes caractéristiques HLA qu’un patient existe dans un registre, 
                    c’est à dire qu’il s’y soit inscrit. Si un registre est très important en taille mais qu’il est composé de profils HLA redondants ou si les profils
                    présents ne correspondent pas aux critères de sélection des médecins greffeurs et aux besoins des patients ; cela n’offre pas plus de chance de 
                    greffes aux patients. C’est la qualité des profils des donneurs et la diversité des caractéristiques HLA qui donnent davantage de chances de greffes.
                    Et cette diversité peut bien sûr être trouvée au sein de populations jeunes.
                </p>
            </div>
            
    </section>

@stop
