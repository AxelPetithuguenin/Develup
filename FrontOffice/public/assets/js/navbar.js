document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-links ul li a');
    const navLinksContainer = document.querySelector('.nav-links');
    const menuHamburger = document.querySelector('.menu-hamburger');
    const blurContent = document.querySelector('.blur-content'); 
    const barMenus = document.querySelectorAll('.bar-menu');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 900) {
                navLinksContainer.classList.remove('active');
                toggleBlur(); 
                toggleWhite(); 
                toggleMenuIcon();
            }
        });
    });

    menuHamburger.addEventListener('click', () => {
        navLinksContainer.classList.toggle('active');
        toggleBlur(); 
        toggleWhite(); 
        toggleMenuIcon();
    });

    // Ajouter l'effet blur ou non 
    function toggleBlur() {
        if (navLinksContainer.classList.contains('active')) {
            blurContent.style.display = 'block';
        } else {
            blurContent.style.display = 'none';
        }
    }

    // Ajouter le menu burger en blanc ou en vert
    function toggleWhite() {
        barMenus.forEach(barMenu => {
            if (navLinksContainer.classList.contains('active')) {
                barMenu.classList.add('white');
            } else {
                barMenu.classList.remove('white');
            }
        });
    }

    // Changer l'icône du menu hamburger
    function toggleMenuIcon() {
        barMenus.forEach(barMenu => {
            if (navLinksContainer.classList.contains('active')) {
                barMenu.style.transform = 'rotate(45deg)';
            } else {
                barMenu.style.transform = 'rotate(0)';
            }
        });
    }
});
