<div class="contenu">
    <div id="avis">

        <!--svg width="200" height="100">
            <rect width="200" height="100" style="fill:blue;stroke:black;" />
        </svg -->
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

                // Vider le conteneur avant d'afficher les nouvelles données
                $('#avis').empty();

                // Afficher la première donnée dans le conteneur
                
                data.forEach(function(item) {
                    $('#avis').append('<p>' + texte + '</p> <br><p>'+nom+'</p>'); // Remplacez 'nom_colonne' par le nom de la colonne de votre table
                });
            },
            error: function(data) {
                console.log(data);
                alert("Une erreur est survenue lors de la récupération des données.");
            }
        });
    });

    function afficherAvis(data){
        if(data!=empty){
            let avisPage=data[0];
            let cle1 = Object.keys(avisPage)[0]; 
            let Objet1 = avisPage[cle1]; 
            let cle2 = Object.keys(avisPage)[1]; 
            let Objet2 = avisPage[cle2]; 
            delete data[0];
            return Objet1,Objet2;
        }
    }
</script>