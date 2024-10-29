<form id="login_form" action="" method="POST">
    <table>
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Mot de passe :</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>
<button>Séralisation</button>
<script>
$(document).ready(function(){
    //Lors du clic sur le bouton...
    $("button").click(function(){
        /*Transforme les données du formulaire en chaine de requête de la forme
        prenom=pierre&mail=pierre.giraud%40edhec.com*/
        let chaine = $("login_form").serialize();

        /*Transforme les données du formulaire en un tableau d\'objets de la forme 
        [
        {
            name : "prenom",
            value : "pierre"
            },
            {
            name : "mail",
            value : "pierre.giraud@edhec.com"
            }
        ]*/
        let tb = $("login_form").serializeArray();
        
        //Affiche les résultats dans la console
        console.log(chaine);
        console.log(tb);
    });
});
</script>



 