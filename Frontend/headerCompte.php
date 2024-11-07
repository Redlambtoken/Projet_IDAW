<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calend'Eat</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
        <link rel="stylesheet" href="css/menuDeroulant.css">
        
    <body>

        <div id ="haut" class="header row">
            <a class="menu-toggle rounded" ><i class="fas fa-bars"></i></a>
                <nav id="sidebar-wrapper">
                    <ul class="sidebar-nav"> 
                        <li class="sidebar-brand"><a href="pageCompte.php#haut"> </a></li>
                        <li class="sidebar-nav-item"><a href="pageCompte.php">Accueil</a></li>
                        <li class="sidebar-nav-item"><a href="pageRecette.php">Créer une recette</a></li>
                        <li class="sidebar-nav-item"><a href="pageRepas.php">Ajouter un repas</a></li>
                        <li class="sidebar-nav-item"><a href="pageCompte.php#bas">Nous Contacter</a></li>
                        <li class="sidebar-nav-item" id="deconnection"><a href="pageAccueil.php">Déconnection</a></li>
                    </ul>
                </nav>
            <div>
                <img src="imgs/Logo_Calend_Eat.png" alt="ImageLogo" height ="90%" width="10%">
            </div>      
        </div>
        <div id="citation" class="row">
        </div>
        <script src="js/header.js"></script>
