<?php

//end point du login qui demande un get avec un json en param avec un hash md5
require_once("init_pdo.php");

function loginUser($db, $json){
    $data = json_decode($json);
    if(isset($data->login) && (isset($data->password))){
        $sql_check = "SELECT NOM_UTILISATEUR, PASSWORD FROM `utilisateur` WHERE ID_UTILISATEUR = :login AND PASSWORD = :password"; //à adapter si besoin
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':login', $data->login, PDO::PARAM_STR);
        $exe_check->bindParam(':password', $data->password, PDO::PARAM_STR);
        $exe_check->execute();
        $res_check = $exe_check->fetch(PDO::FETCH_OBJ);
        if($res_check != null){
            return 200; //OK l'utilisateur existe bel et bien
        }
        return 404; //404 Mauvaise saisie de login/password
    }
    return 400; //pas de login et/ou de password
}

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
    }