<?php

    require_once('header.php');

    echo '
    <table>
        <form id="Création de compte" action="" method="POST">
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
                <label for="sexe">Sexe : </label>
                <select id="sexe" name="sexe">
                    <option value="0">Insérer valeur</option>
                    <option value="1">Femme</option>
                    <option value="2">Homme</option>
                    <option value="3">Autre</option>
                </select>
                <br>
                <br>
                <label for="sport">Sport : </label>
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
    ';

    require_once('footer.php');