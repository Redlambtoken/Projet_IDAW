
    <table>
        <form id="créationCompte" action="" method="POST">
            <div class="form-group row">
                <tr>
                <label for="inputNom" class="col-sm-2 col-form-label">Nom*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputNom" required>
                </div>
                </tr>
                <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPrenom" required>
                </div>
                <label for="inputLogin" class="col-sm-2 col-form-label">Login*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputLogin" required>
                </div>
                <br>
                <label for="email" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmail" required>
                </div>
                <br>
                <label for="inputPwd" class="col-sm-2 col-form-label">Mot de passe*</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPwd" required>
                </div>
                <br>
                <label for="inputPwd2" class="col-sm-2 col-form-label">Vérification de mot de passe*</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPwd2" required>
                </div>
                <br>
                <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance*</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="inputDate" required>
                </div>
                <br>
                <br>
                <label for="sexe">Sexe* : </label>
                <select id="sexe" name="sexe" required>
                    <option value="0">Insérer valeur</option>
                    <option value="1">Femme</option>
                    <option value="2">Homme</option>
                    <option value="3">Autre</option>
                </select>
                <br>
                <br>
                <label for="sport">Sport* : </label>
                <select id="sport" name="sport" required>
                    <option value="0">Insérer valeur</option>
                    <option value="1">Bas</option>
                    <option value="2">Moyen</option>
                    <option value="3">Elevé</option>
                </select>
                <br>
            </div>
            <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
    </table>
    <br>
    <div id="texte"></div>

    
    <script>

        
            $(document).ready(function(){
                $('#login_form').submit(function(event){
                    event.preventDefault();

                    if ($("#inputPwd").val()!=$("#inputPwd2").val()){
                        $('#texte').append('<p>Les deux mots de passes ne sont pas les mêmes</p>')
                    }
                    else{
                        // Hachage du mot de passe avec MD5
                        const pwd = $("#inputPwd2").val();
                        const pwdMD5 = CryptoJS.MD5(pwd).toString();

                        $.ajax({ 
                            url: "LoginAPI.php",
                            method: "POST",
                            dataType : "json",
                            data: JSON.stringify({
                                sexe : $("#inputSexe").val(),
                                sport : $("#inputSport").val(),
                                name : $("#inputNom").val(),
                                prenom : $("#inputPrenom").val(),
                                year : $("#inputDate").val(),
                                email : $("#inputEmail").val(),
                                password : pwdMD5
                            }),

                            success: function(response) {
                                if (response=== 201) {
                                    $('#texte').append('<p> Le compte a été crée </p>')
                                } else if (response === 401) {
                                    $('#texte').append('<p>Cet email est associé à un compte existant</p>')
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Erreur lors de la requête AJAX : " + error);
                            }
                        }
                    })
                    
                }) 
            });
        </script>