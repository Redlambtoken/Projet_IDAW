<!-- Inclure jQuery et CryptoJS pour que le code fonctionne 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script -->

<!-- Formulaire de connexion -->
<div class="content">
<form id="login_form" action="">
    <table>
        <tr>
            <th>Login* :</th>
            <td><input type="text" name="Login" id="inputLogin" required></td>
        </tr>
        <tr>
            <th>Mot de passe* :</th>
            <td><input type="password" name="Password" id="inputPwd" required></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>
<p style="color: red; font-style: italic;">* : champ obligatoire</p>
<div id="text"></div>
</div>
<script>
    $(document).ready(function(){
        $('#login_form').submit(function(event){
            event.preventDefault();
            
            // Vérifier que les champs ne sont pas vides
            const login = $("#inputLogin").val();
            const pwd = $("#inputPwd").val();
            
            // Hachage du mot de passe avec MD5
            const pwdMD5 = CryptoJS.MD5(pwd).toString();

            // Envoi de la requête AJAX
            $.ajax({ 
                url: "../backend/LoginAPI.php",
                method: "POST",
                dataType: "json",
                contentType : "application/json",
                data: JSON.stringify({
                    login: login,
                    password: pwdMD5
                }),
                success: function(response) {
                    if (response === 200) {
                        window.location.href = 'pageCompte.php';
                    } else if (response === 400) {
                        $("#text").empty;
                        $("#text").append('<p>Login ou mot de passe nnon valide</p>')
                    }
                },
                error: function() {
                    $("#text").empty;
                    $("#text").append("Une erreur est survenue lors de la connexion. Veuillez réessayer.");
                }
            });
        });
    });
</script>
