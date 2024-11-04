<div class="contenu">
    <div class="avis">
        <div>
            <button id="boutongauche">
                <img src="Capture-flèche-gauche.png" alt="Bouton Image" height="15px">
            </button>
        </div>
        <!-- avis-->
        <div id="texte">

        </div>
        <!-- flèche droite-->
        <div>
            <button id="boutondroite">
                <img src="Capture-flèche-droite.png" alt="Bouton Image" height="15px">
            </button>
        </div>
    </div>
    <div id="milieu row">
        A propos de nous
    </div> 
</div>

<script>
    $(document).ready(function(){
        $.ajax({
            url: '../backend/avisAPI.php', // URL du script PHP
            method: 'GET', // Méthode GET pour récupérer des données
            dataType: 'json', // Type de données attendu
            
            success: function(data) {
                console.log(data);
                // Vérifier s'il y a une erreur
                if (data.error) {
                    alert("Erreur : " + data.error);
                    return;
                }
                console.log(data.length);
                let indice=0;

                // Vider le conteneur avant d'afficher les nouvelles données
                $('#texte').empty();

                // Afficher la première donnée dans le conteneur
                let opinion = afficherAvis(data, indice);
                console.log(opinion[0]);
                console.log(opinion[1]);
                $('#texte').append('<p>' + opinion[0] + '</p> <br><p>'+opinion[1]+'</p>'); // Ajoute dans l'avis le texte et le nom de la personne
            
                $("#boutondroite").on("click", function() {
                    if(indice!=data.length-1){
                        indice=indice+1;
                        $('#texte').empty();
                        let opinion = afficherAvis(data,indice);
                        $('#texte').append('<p>' + opinion[0] + '</p> <br><p>' + opinion[1] + '</p>');
                    }
                    else{
                        $('#texte').empty();
                        let opinion = afficherAvis(data,indice);
                        $('#texte').append('<p>' + opinion[0] + '</p> <br><p>' + opinion[1] + '</p>');
                    }
                });

                $("#boutongauche").on("click", function() {
                    if(indice!=0){
                        indice=indice-1
                        $('#texte').empty();
                        let opinion = afficherAvis(data,indice);
                        $('#texte').append('<p>' + opinion[0] + '</p> <br><p>' + opinion[1] + '</p>');
                    }
                    else{
                        $('#texte').empty();
                        let opinion = afficherAvis(data,indice);
                        $('#texte').append('<p>' + opinion[0] + '</p> <br><p>' + opinion[1] + '</p>');
                    }
                });

            },   
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert("Une erreur est survenue lors de la récupération des données.");
            }
        });
    });


    function afficherAvis(data, indice) {
    if (data.length > 0) { 
        let avisPage = data[indice];
        let cle1 = Object.keys(avisPage)[0];
        let Objet1 = avisPage[cle1];
        let cle2 = Object.keys(avisPage)[1];
        let Objet2 = avisPage[cle2];
        
        return [Objet1, Objet2]; 
    }
}

</script>