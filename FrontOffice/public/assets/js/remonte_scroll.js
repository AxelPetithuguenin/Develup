// REMONTER EN HAUT DE LA PAGE
function remonteurHaut() {
    // REMONTE TOUT EN HAUT A TOP=0; 
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// AFFICHE OU MASQUE LE BOUTON EN FONCTION DE SA POSITION DU SCROLL
window.onscroll = function() { afficherBtnRemonter() };

function afficherBtnRemonter() {
    // SI USER BAISSE DE 20PX ALORS AFFICHER LE BTN
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btnRemonter").style.display = "block";
    } else {
        document.getElementById("btnRemonter").style.display = "none";
    }
}
