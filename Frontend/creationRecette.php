<p>Une nouvelle recette ?</p>

<form>
    <label for="inputNom" class="col-sm-2 col-form-label">Nom de la recette</label>
    <div>
        <input type="text" class="form-control" id="inputNom" >
    </div>
    <label for="sexe">Sexe* : </label>
    <select id="sexe" name="sexe">
        <option value="0">Insérer valeur</option>
        <option value="1">Femme</option>
        <option value="2">Homme</option>
        <option value="3">Autre</option>
    </select>
</form>
<script>
    $(document).ready(function(){
            // Envoi de la requête AJAX
            $.ajax({ 
                url: "../backend/recettesAPI.php",
                method: "GET",
                success: function(response) {
                    alert(response);
                    if (response === 200) {
                        window.location.href = 'pageCompte.php';
                    } else if (response === 400) {
                        alert("Login ou mot de passe incorrect");
                    }
                },
                error: function() {
                    alert("Une erreur est survenue lors de la connexion. Veuillez réessayer.");
                }
            });
        });
</script>
