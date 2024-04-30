@extends('template')


@section('content')

    <!-- // C EST QUOI LE DON DE MOELLE OSSEUSE CONTAINER -->
    <section class="container-page">
        <!-- // TEXT // -->
        <div class="paragraphe-text">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Don de Moelle Osseuse
                    </h3>
                </div>
                <div class="header-text-container">
                    <p class="text">
                        La greffe de moelle osseuse représente un espoir de guérison pour de nombreuses 
                        personnes atteintes de cancers ou de maladies graves du système sanguin. La moelle osseuse, 
                        source des cellules du sang. La moelle osseuse est située dans les os longs et les os plats 
                        à ne pas confondre avec la moelle épinière, située dans la colonne vertébrale. Elle renferme des 
                        cellules très précieuses, appelées cellules souches hématopoïétiques, qui donnent naissance aux 
                        cellules du sang : les globules rouges, les globules blancs et les plaquettes.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- // TEXT // -->
        <div class="personnal-temoignage-text">
            <div class="paragraphe-text">
                <div class="paragraphe-title">
                    <p class="paragraphe-title-orange text">
                        A quoi sert le don ?     
                    </p>
                    <div class="bottom-bar-text"></div>
                </div>
                <p class="text">
                    Pour soigner les maladies du sang, la greffe de moelle osseuse est l’un des traitements efficaces.80 % des greffes 
                    de moelle osseuse sont réalisées pour traiter certaines formes de cancers comme les leucémies, les lymphomes, les myélomes...
                    Les personnes atteintes de maladies du sang (thalassémie, drépanocytose), d’anémie aplasique ou de troubles héréditaires du 
                    système immunitaire et du métabolisme peuvent également avoir besoin d’une greffe de moelle osseuse.
                </p>
            </div>

            <div class="paragraphe-text">
                <div class="paragraphe-title">
                    <p class="paragraphe-title-orange text">
                        Qui peut donner ?    
                    </p>
                    <div class="bottom-bar-text"></div>
                </div>
                <p class="text">
                    Etre volontaire au don de moelle osseuse signifie être inscrit sur le registre France greffe de moelle.
                    Pour ce faire, il faut :
                    <ul class="liste">
                        <li class="text liste">
                            être en parfaite santé et avoir entre 18 et moins de 36 ans lors de l’inscription, même si on peut donner jusqu’à la veille de ses 61 ans
                        </li>
                        <li class="text liste">
                            passer un entretien médical spécifique pour faire le point sur ses antécédents médicaux et son mode de vie;
                        </li>
                        <li class="text liste">
                            s’engager à rester joignable et à se rendre disponible pour les examens médicaux en cas de compatibilité avec un receveur.
                        </li>
                    </ul>
                </p>
            </div>

            <!-- // VIDEO // -->
            <div class="video-container">
                <iframe src="https://www.youtube.com/watch?v=gfuLic2jyRA" alt="video-explication-don-de-moelle-osseuse" class="simple-video"></iframe>
            </div>

            <!-- // TEXT // -->
            <div class="paragraphe-text">
                <p class="text">
                    La compatibilité nécessaire pour une greffe de moelle osseuse fait appel à un système complexe, le HLA, différent de celui des groupes sanguins. 
                    La probabilité de trouver deux individus compatibles pour une greffe de moelle osseuse en dehors de la fratrie est ainsi d’une sur un million ! 
                    Sachant que pour deux membres d’une même fratrie, les probabilités s’élèvent à une sur quatre. C’est pourquoi chaque nouvelle inscription compte 
                    et apporte une chance supplémentaire de guérison pour les malades.
                </p>
            </div>

            <div class="title-center" style="text-align: center;">
                <p class="text" style="font-weight: var(--middle-font-weight); letter-spacing: 2px;">
                    Le déroulement
                </p>
                <div class="bottom-bar-text border-bottom-green"></div>
            </div>

            <!-- // CARD // -->
            <div class="wrap">

                <article class="simple-card">
                    <div class="simple-card-image-container">
                        <img src="./assets/img/logo/don-de-moelle-osseuse-2.png" alt="le déroulement du don de la moelle osseuse" class="simple-card-image"/>
                    </div>
                    <div class="simple-card-text-container">
                        <p class="card-text-title text">
                            Avant le don :
                        </p>
                        <p class="text">
                            La compatibilité nécessaire pour une greffe de moelle osseuse fait appel à un système complexe, 
                            le HLA, différent de celui des groupes sanguins. La probabilité de trouver deux individus compatibles pour une 
                            greffe de moelle osseuse en dehors de la fratrie est ainsi d’une sur un million ! Sachant que pour deux membres 
                            d’une même fratrie, les probabilités s’élèvent à une sur quatre. C’est pourquoi chaque nouvelle inscription compte 
                            et apporte une chance supplémentaire de guérison pour les malades.
                        </p>
                    </div>
                </article>

                <article class="simple-card">
                    <div class="simple-card-text-container">
                        <p class="card-text-title text">
                            Le prélèvement :
                        </p>
                        <p class="text">
                            Le prélévement
                            Il existe aujourd’hui deux façons de prélever les cellules souches hématopoïétiques de la moelle osseuse :
                            <ul class="liste">
                                <li class="text liste">
                                    Le prélèvement de cellules souches périphériques (environ 80% des cas) :il n’y a pas d’hospitalisation.
                                    Le donneur reçoit, pendant les quelques jours précédant le prélèvement, un médicament favorisant la migration vers 
                                    le sang des cellules souches hématopoïétiques de la moelle osseuse. Ces cellules sont ensuite recueillies en 3 ou 4 heures 
                                    via un prélèvement sanguin par aphérèse, dans un centre de l’EFS.
                                </li>
                                <li class="text liste">
                                    Le prélèvement direct de moelle osseuse (environ 18% des cas) :Il est réalisé à l’hôpital, sous anesthésie générale, par ponction 
                                    dans les os iliaques (au niveau du bassin). Le donneur sort le lendemain de l’hôpital.
                                </li>
                            </ul>
                        </p>
                    </div>
                    <div class="simple-card-image-container">
                       <img src="./assets/img/logo/don-de-moelle-osseuse-2.png" alt="le déroulement du don de la moelle osseuse" class="simple-card-image"/>
                    </div>
                </article>

                <article class="simple-card">
                    <div class="simple-card-image-container">
                    <img src="./assets/img/logo/don-de-moelle-osseuse-2.png" alt="le déroulement du don de la moelle osseuse" class="simple-card-image"/>
                    </div>
                    <div class="simple-card-text-container">
                        <p class="card-text-title text">
                            Arpès le don :
                        </p>
                        <p class="text">
                            Le corps régénère les cellules souches prélevées dans les 6 semaines suivant le don. 
                            La plupart des donneurs reprennent leurs activités habituelles dans les quelques jours 
                            suivant le don. Un suivi annuel, non obligatoire, est proposé aux donneurs.
                        </p>
                    </div>
                </article>

            </div>

            <!-- // VIDEO // -->
            <div class="title-center">
                <p class="text" style="font-weight: var(--middle-font-weight); letter-spacing: 2px;">
                    Pour aller plus loin
                </p>
                <div class="bottom-bar-text border-bottom-green"></div>
            </div>
            <div class="wrap">
                <iframe src="https://youtu.be/MT3NRcV01bg?list=TLGGd99fl1YgaaAxNzAyMjAyNA" alt="video-explication-don-de-moelle-osseuse" class="small-video"></iframe>
                <iframe src="https://youtu.be/A-5WNH6hBGA?list=TLGGGH5efu68y5YxNzAyMjAyNA" alt="video-explication-don-de-moelle-osseuse" class="small-video"></iframe>
                <iframe src="https://youtu.be/Xo94QA7e4zU?list=TLGGTFoeNbyy_HIxNzAyMjAyNA" alt="video-explication-don-de-moelle-osseuse" class="small-video"></iframe>
                <iframe src="https://video.wixstatic.com/video/5f4624_78dce9ae8ce64f76940bc39885f7df56/720p/mp4/file.mp4" alt="video-explication-don-de-moelle-osseuse" class="small-video"></iframe>
            </div>

            <!-- // OU ENCORE PLUS LOIN // -->
            <div class="title-start" style="margin-top: 75px;">
                <p class="text" style="font-weight: var(--middle-font-weight); letter-spacing: 2px;">
                    Pour aller plus loin
                </p>
                <div class="bottom-bar-text border-bottom-green"></div>
            </div>
            <div class="text-link-container">
                <div class="text-link-content">
                    <a href="dondemoelleosseuse.fr" class="text text-link">
                        dondemoelleosseuse.fr
                    </a> 
                </div>
                <div class="text-link-content">
                    <a href="www.agence-biomedecine.f" class="text text-link">
                        www.agence-biomedecine.f
                    </a>
                </div>
                <div class="text-link-content">
                    <a href="jeunesdonneurs.fr" class="text text-link">
                        jeunesdonneurs.fr
                    </a>
                </div>
            </div>
        </div>

    </section>

@stop
