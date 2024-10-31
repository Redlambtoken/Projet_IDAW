<div class="contenu">
    <div id="avis">
        Ici avis
    </div>
    <div id="milieu">
        A propos de nous
    </div> 
</div>

<script>
    $(document).ready(function(){
        $.ajax({
            url: 'avisAPI.php', // URL du script PHP
            method: 'GET', // Méthode GET pour récupérer des données
            dataType: 'json', // Type de données attendu
            success: function(data) {
                // Vérifier s'il y a une erreur
                if (data.error) {
                    alert("Erreur : " + data.error);
                    return;
                }

                // Vider le conteneur avant d'afficher les nouvelles données
                $('#dataContainer').empty();

                // Afficher les données dans le conteneur
                data.forEach(function(item) {
                    $('#dataContainer').append('<p>' + item.nom_colonne + '</p>'); // Remplacez 'nom_colonne' par le nom de la colonne de votre table
                });
            },
            error: function() {
                alert("Une erreur est survenue lors de la récupération des données.");
            }
        });
    });
</script>