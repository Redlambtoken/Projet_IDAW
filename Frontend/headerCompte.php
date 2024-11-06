<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calend'Eat</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="scripts.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
        <link rel="stylesheet" href="menuDeroulant.css">
    <body>

        <div id ="haut" class="header">
            <a class="menu-toggle rounded" ><i class="fas fa-bars"></i></a>
                <nav id="sidebar-wrapper">
                    <ul class="sidebar-nav"> 
                        <li class="sidebar-brand"><a href="$pageActuel.php#haut"> </a></li>
                        <li class="sidebar-nav-item"><a href="pageCompte.php">Accueil</a></li>
                        <li class="sidebar-nav-item"><a href="pageRecette.php">Créer une recette</a></li>
                        <li class="sidebar-nav-item"><a href="pageRepas.php">Ajouter un repas</a></li>
                        <li class="sidebar-nav-item"><a href="$pageActuel#bas">Nous Contacter</a></li>
                        <li class="sidebar-nav-item" id="deconnection"><a href="pageAccueil.php">Déconnection</a></li>
                    </ul>
                </nav>
            <div>
                <img src="Logo_Calend_Eat.png" alt="ImageLogo" height ="100%" width="100%">
            </div>      
        </div>
        <div id="citation" class="row">
             Cuisiner c'est donner une saveur à l'amour
        </div>

<script>
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
                $('#citation').append('<p>' + data[numéroCitation]+'</p>'); // Ajoute dans l'avis le texte et le nom de la personne

            },   
            error: function(jqXHR, textStatus, errorThrown) {
                $('#citation').append('<p>Citation</p>');
            }
        });
    });

    $(document).ready(function(){
        $('#deconnection').click(function(event){
            event.preventDefault(); 
            $.ajax({
                url: "../backend/loginAPI.php",
                method: "GET",
                success: function(response){
                    alert("oui");
                    if(response === 200){
                        window.location.href='pageAccueil.php'
                    }
                }
            })
        })
    })
</script>