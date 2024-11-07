//Script du menu déroulant
document.addEventListener('DOMContentLoaded', event => {

    const sidebarWrapper = document.getElementById('sidebar-wrapper');
    let scrollToTopVisible = false;
    // Closes the sidebar menu
    const menuToggle = document.body.querySelector('.menu-toggle');
    menuToggle.addEventListener('click', event => {
        event.preventDefault();
        sidebarWrapper.classList.toggle('active');
        _toggleMenuIcon();
        menuToggle.classList.toggle('active');
    })

    // Closes responsive menu when a scroll trigger link is clicked
    var scrollTriggerList = [].slice.call(document.querySelectorAll('#sidebar-wrapper .js-scroll-trigger'));
    scrollTriggerList.map(scrollTrigger => {
        scrollTrigger.addEventListener('click', () => {
            sidebarWrapper.classList.remove('active');
            menuToggle.classList.remove('active');
            _toggleMenuIcon();
        })
    });

    function _toggleMenuIcon() {
        const menuToggleBars = document.body.querySelector('.menu-toggle > .fa-bars');
        const menuToggleTimes = document.body.querySelector('.menu-toggle > .fa-xmark');
        if (menuToggleBars) {
            menuToggleBars.classList.remove('fa-bars');
            menuToggleBars.classList.add('fa-xmark');
        }
        if (menuToggleTimes) {
            menuToggleTimes.classList.remove('fa-xmark');
            menuToggleTimes.classList.add('fa-bars');
        }
    }
/*
// Scroll to top button appear
    document.addEventListener('scroll', () => {
        const scrollToTop = document.body.querySelector('.scroll-to-top');
        if (document.documentElement.scrollTop > 100) {
            if (!scrollToTopVisible) {
                fadeIn(scrollToTop);
                scrollToTopVisible = true;
            }
        } else {
            if (scrollToTopVisible) {
                fadeOut(scrollToTop);
                scrollToTopVisible = false;
            }
        }
    })*/
})

// Citation
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


$(document).ready(function(){
    $.ajax({
        url: '../backend/CitationAPI.php', // URL du script PHP
        method: 'GET', // Méthode GET pour récupérer des données
        dataType: 'json', // Type de données attendu
        
        success: function(data) {
            console.log(data);
            // Vérifier s'il y a une erreur
            if (data.error) {
                alert("Erreur : " + data.error);
                return;
            }
            let numéroCitation = getRandomIntInclusive(0, data.length-1);

            // Vider le conteneur avant d'afficher les nouvelles données
            $('#citation').empty();

            // Afficher la première donnée dans le conteneur
            $('#citation').append('<p>' + data[numéroCitation].CITATION_TEXT+'</p>'); // Ajoute dans l'avis le texte et le nom de la personne

        },   
        error: function(jqXHR, textStatus, errorThrown) {
        
        }
    });
});



