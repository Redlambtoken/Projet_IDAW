
    <table>
        <form id="créationCompte" action="" method="POST">
            <div class="form-group row">
                <tr>
                <label for="inputNom" class="col-sm-2 col-form-label">Nom*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputNom" >
                </div>
                </tr>
                <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPrenom" >
                </div>
                <label for="inputLogin" class="col-sm-2 col-form-label">Login*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputLogin" >
                </div>
                <br>
                <label for="email" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmail" >
                </div>
                <br>
                <label for="inputPwd" class="col-sm-2 col-form-label">Mot de passe*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPsw" >
                </div>
                <br>
                <label for="inputPwd2" class="col-sm-2 col-form-label">Vérification de mot de passe*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPsw2" >
                </div>
                <br>
                <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance*</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="inputDate" >
                </div>
                <br>
                <br>
                <label for="sexe">Sexe* : </label>
                <select id="sexe" name="sexe">
                    <option value="0">Insérer valeur</option>
                    <option value="1">Femme</option>
                    <option value="2">Homme</option>
                    <option value="3">Autre</option>
                </select>
                <br>
                <br>
                <label for="sport">Sport* : </label>
                <select id="sport" name="sport">
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

    
    <script>
            $(document).ready(function(){

                const sexe : $("#inputSexe").val();
                const sport : $("#inputSport").val();
                const name : $("#inputNom").val();
                const prenom : $("#inputPrenom").val();
                const year : $("#inputDate").val();
                const email : $("#inputEmail").val();
                const password : $("#inputPwd2").val();

                if (sexe === "Insérer valeur" || sport ="Insérer valeur"|| name === "" || prenom === ""|| year === ""|| email === ""|| password === "") {
                    alert("Veuillez remplir tous les champs demandés");
                    return;
                }

                $.ajax({ 
                    url: "LoginAPI.php",
                    method: "POST",
                    dataType : "json",
                    data: {
                        sexe : $("#inputSexe").val(),
                        sport : $("#inputSport").val(),
                        name : $("#inputNom").val(),
                        prenom : $("#inputPrenom").val(),
                        year : $("#inputDate").val(),
                        email : $("#inputEmail").val(),
                        password : $("#inputPwd2").val()
                    }

                    success: function(data{
                       $(\'#avis\').append() 
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

                //Ce code sera exécuté en cas d\'échec - L\'erreur est passée à fail()
                .fail(function(error){
                    alert("La requête s\'est terminée en échec. Infos : " + JSON.stringify(error));
                })
            });
        </script>