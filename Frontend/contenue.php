<div class="contenu">
    <div class="avis">
        <div>
            <button class="bouton" onclick="alert('Bouton cliqué !')">
                <img src="Capture-flèche-gauche.png" alt="Bouton Image" height="15px">
            </button>
        </div>
        <!-- avis-->
        <div id="texte">
            hjdhsjfJDGFLufyugeyf
        </div>
        <!-- flèche droite-->
        <div>
            <button class="bouton" onclick="alert('Bouton cliqué !')">
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

                let

                // Vider le conteneur avant d'afficher les nouvelles données
                $('#avis').empty();

                // Afficher la première donnée dans le conteneur
                let opinion = afficherAvis(data);
                $('#texte').append('<p>' + opinion[0] + '</p> <br><p>'+opinion[1]+'</p>'); // Ajoute dans l'avis le texte et le nom de la personne
            
                $(document).getElementById("bouton").addEventListener("click",fuction(){
                    $('#avis').empty();
                    let opinion = afficherAvis(data);
                    $('#texte').append('<p>' + opinion[0] + '</p> <br><p>'+opinion[1]+'</p>');
                })
            }    
            error: function(data) {
                console.log(data);
                alert("Une erreur est survenue lors de la récupération des données.");
            }
        });
    });

    $(document).getElementById("bouton").addEventListener("click",fuction(){
        $('#avis').empty();
        let opinion = afficherAvis(data)
    })

    function afficherAvis(data) {
    if (data.length > 0) { 
        let avisPage = data[0];
        let cle1 = Object.keys(avisPage)[0];
        let Objet1 = avisPage[cle1];
        let cle2 = Object.keys(avisPage)[1];
        let Objet2 = avisPage[cle2];
        
        data.shift(); // Enlève le première élément des données

        return { Objet1, Objet2 }; 
    }
}

</script>