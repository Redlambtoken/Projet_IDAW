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
<script src="js/connexion.js"></script>
