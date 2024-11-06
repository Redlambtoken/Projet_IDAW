<?php

//end point du login qui demande un get avec un json en param avec un hash md5
require_once("init_pdo.php");

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
    }

function loginUser($db, $json){
    $data = json_decode($json);
    if((isset($data->password)) && (isset($data->year)) && (isset($data->email)) && (isset($data->sexe)) && (isset($data->sport)) && (isset($data->prenom))  && (isset($data->name)) && (isset($data->Login))){
        $sql_check = "SELECT NOM_UTILISATEUR FROM `utilisateur` WHERE email = :email"; //à adapter si besoin
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':email', $data->email, PDO::PARAM_STR);
        $exe_check->execute();
        $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
        if($res_check == null){
            $sql = "INSERT INTO `utilisateur`(`ID_SEXE`, `ID_SPORT`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `ANNEE_DE_NAISSANCE`, `EMAIL`, `PASSWORD`, `LOGIN_UTILISATEUR`) VALUES (:sexe,:sport,:name,:prenom,:year,:email,:password, :loginU)";
            $exe = $db->prepare($sql);
            $exe->bindParam(':sexe', $data->sexe, PDO::PARAM_INT);
            $exe->bindParam(':sport', $data->sport, PDO::PARAM_INT);
            $exe->bindParam(':name', $data->name, PDO::PARAM_STR);
            $exe->bindParam(':prenom', $data->prenom, PDO::PARAM_STR);
            $exe->bindParam(':year', $data->year, PDO::PARAM_STR);
            $exe->bindParam(':email', $data->email, PDO::PARAM_STR);
            $exe->bindParam(':password', $data->password, PDO::PARAM_STR);
            $exe->bindParam(':loginU', $data->Login, PDO::PARAM_STR);
            $exe->execute();
            $res_check = $exe->fetchAll(PDO::FETCH_OBJ);
            return 201; //OK l'utilisateur est créé
            //rajouter un try and catch avec try le return 200 et catch un return 500 en disant qu'on peut pas faire la requête SQL
        }
        return 409; //code conflict donc pas possible de le créer car l'email est déjà utilisé
    }
    else if(isset($data->login) && (isset($data->password))){
        $sql_check = "SELECT NOM_UTILISATEUR, ID_UTILISATEUR, ID_SEXE, ANNEE_DE_NAISSANCE, ID_SPORT, PASSWORD FROM `utilisateur` WHERE LOGIN_UTILISATEUR = :login AND PASSWORD = :password"; //à adapter si besoin
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':login', $data->login, PDO::PARAM_STR);
        $exe_check->bindParam(':password', $data->password, PDO::PARAM_STR);
        $exe_check->execute();
        $res_check = $exe_check->fetch(PDO::FETCH_OBJ);
        if($res_check != null){
            $_SESSION["user_login"] = $data->login;
            $_SESSION["user_name"] = $res_check->NOM_UTILISATEUR;
            $_SESSION["user_id"] = $res_check->ID_UTILISATEUR;
            $_SESSION["user_sexe"] = $res_check->ID_SEXE;
            $_SESSION["user_sport"] = $res_check->ID_SPORT;
            $anneeActuelle = date("Y");
            $age = $anneeActuelle - $res_check->ANNEE_DE_NAISSANCE;
            $sql = "SELECT ID_AGE FROM `tranche_age` WHERE AGE_MIN <= :age AND AGE_MAX >= :age"; //à adapter si besoin
            $exe = $db->prepare($sql);
            $exe->bindParam(':age', $age, PDO::PARAM_INT);
            $exe->execute();
            $res = $exe->fetch(PDO::FETCH_OBJ);
            $_SESSION["user_age"] = $res->ID_AGE;
            return 200; //OK l'utilisateur existe bel et bien
        }
        return 400; //400 Mauvaise saisie de login/password
    }
    return 400; //pas de login et/ou de password
}

function modifyPassworUser($db, $json){
    //premier json avec adresse mail pour envoyer le mail avec un nouveau mot de passe pour le gars et une fois qu"il se connecte il peut changer de mdp
    //faire la génération d'un nouveau mdp
    $data = json_decode($json);
    if(isset($data->password) && $_SESSION["user_id"] != null){
        $sql = "UPDATE `utilisateur` SET `PASSWORD`= :Newpassword WHERE ID_UTILISATEUR = :userID";
        $exe = $db->prepare($sql);
        $exe->bindParam(':Newpassword', $data->password, PDO::PARAM_STR);
        $exe->bindParam(':userID', $_SESSION["user_id"], PDO::PARAM_INT);
        $exe->execute();
        return 200;
    }
    return 400;
}

function Disconnect(){
    session_unset();
    session_destroy();
    return 200;
}