
    <table>
        <form id="créationCompte" action="">
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
                <p><div class="" id="verifMail"></div></p>
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
                <p><div class="" id="passwordStrength"></div></p>
                <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance*</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="inputDate" required>
                </div>
                <br>
                <br>
                <label for="sexe">Sexe* : </label>
                <select id="inputSexe" name="sexe" required>
                    <option value="0">Insérer valeur</option>
                    <option value="1">Femme</option>
                    <option value="2">Homme</option>
                    <option value="3">Autre</option>
                </select>
                <br>
                <br>
                <label for="sport">Sport* : </label>
                <select id="inputSport" name="sport" required>
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

    
    <script src="js/creation.js"></script>