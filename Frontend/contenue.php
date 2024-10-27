<div class="contenu">
    <div id="avis">
        Ici avis
        <script>
            $(document).ready(function(){
                $.ajax({ 
                    url: "backend/avisAPI.php",
                    method: "GET",
                    dataType : "json",
                    success: function(data{
                       $('#avis').append() 
                    })
                    error: function(xhr, status, error) {
                        console.error("Erreur lors de la requête AJAX : " + error);
                    }
                })

                //Ce code sera exécuté en cas de succès - La réponse du serveur est passée à done()
                .done(function(response){
                    let data = JSON.stringify(response);
                    $("div#res").append(data);
                })

                //Ce code sera exécuté en cas d'échec - L'erreur est passée à fail()
                .fail(function(error){
                    alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
                })
            });
        </script>
    </div>
    <div id="milieu">
        A propos de nous
    </div> 
</div>