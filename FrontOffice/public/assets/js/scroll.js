// SCROLLREVEAL VARIABLES 
const sr = ScrollReveal();


// ACCUEIL PAGE //
    // HOME PAGE // 
    sr.reveal('.green-shape',{
        duration: 3500
    }); 
    sr.reveal('.accueil-title',{
        duration: 1500
    }); 
    sr.reveal('.accueil-text-content',{
        duration: 2500
    }); 
    sr.reveal('.btn-link',{
        duration: 3000
    }); 
    sr.reveal('.scroll',{
        duration: 3000
    }); 

    // PROCHAINES ACTIONS / ACTUALITE //
    sr.reveal('.middle-title',{
        duration: 1500
    });
    sr.reveal('hr',{
        duration: 1500
    });
    sr.reveal('.prochaines-actions-content',{
        duration: 2000
    });

    // DEVENIR DONNEUR ALERT MESSAGE //
    sr.reveal('.prochaines-actions-content',{
        duration: 2000
    });
    sr.reveal('.message-text-container',{
        duration: 1500
    });
    sr.reveal('.number-compter',{
        duration: 2500
    });

    // TEMOIGNAGES //
    sr.reveal('.temoignage-content',{
        duration: 2000
    });



    // TEMOIGNAGE PAGE //
    sr.reveal('.middle-title', {
        duration: 1500
    });

    sr.reveal('.header-text-container', {
        duration: 600
    });

    sr.reveal('.card-temoignage-page', {
        duration: 1000,
        interval: 200,
        origin: 'bottom',
        distance: '20px',
        delay: 200
    });

    sr.reveal('.pagination-btn', {
        duration: 1000,
        delay: 200,
        origin: 'bottom',
        distance: '20px'
    });

    // PERSONNAL TEMOIGNAGE PAGE //
    sr.reveal('.header-personnal-temoignage-page-content', {
        delay: 200,
        duration: 1000,
        origin: 'bottom',
        distance: '20px',
        easing: 'ease-in-out',
        reset: true
    });

    sr.reveal('.personnal-temoignage-text', {
        delay: 400,
        duration: 1000,
        origin: 'bottom',
        distance: '20px',
        easing: 'ease-in-out',
        reset: true
    });

    // DON DE MOELLE OSSEUSE //
    sr.reveal('.simple-video', {
        duration: 1000,
        origin: 'bottom',
        distance: '30px',
        delay: 500
    });

    sr.reveal('.simple-card', {
        duration: 1000,
        origin: 'left',
        distance: '50px',
        interval: 200
    });

    sr.reveal('.small-video', {
        duration: 1000,
        origin: 'bottom',
        distance: '30px',
        delay: 200
    });

    // PRESENTATION ASSOCIATION // 
    sr.reveal('.edito-president-container img', {
        duration: 1000,
        origin: 'left', 
        distance: '50px', 
    });
    
    // Animer le titre
    sr.reveal('.middle-title', {
        duration: 1000,
        origin: 'top',
        distance: '30px', 
        delay: 500 
    });
    
    // Animer le contenu du texte
    sr.reveal('.text-edito-container p', {
        duration: 1000,
        origin: 'right', 
        distance: '50px',
        delay: 1000 
    });
    sr.reveal('.presentation-box', {
        duration: 1000, 
        origin: 'bottom', 
        distance: '50px', 
        interval: 200 
    });
    sr.reveal('section.container-page p.text', {
        duration: 1000, 
        origin: 'bottom',
        distance: '30px', 
        delay: 500 
    });

    // PARTENAIRES // 
    sr.reveal('.card-box-image', {
        delay: 200,
        duration: 1000,
        interval: 300,
        origin: 'bottom',
        distance: '20px',
        easing: 'ease-in-out',
        reset: true
    });
