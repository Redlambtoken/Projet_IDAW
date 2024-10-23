<?php

//end point du register qui demande une méthode POST avec un json
require_once("init_pdo.php");

function registerUser($db, $json){ //demande un json avec nom, prenom, année de naissance, email, password, Sexe, Sport
    $data = json_decode($json);
    if((isset($data->password)) && (isset($data->year)) && (isset($data->email)) && (isset($data->sexe)) && (isset($data->sport)) && (isset($data->prenom))  && (isset($data->name))){
        $sql_check = "SELECT NOM_UTILISATEUR FROM `utilisateur` WHERE email = :email"; //à adapter si besoin
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':email', $data->email, PDO::PARAM_STR);
        $exe_check->execute();
        $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
        if($res_check == null){
            $sql_check = "INSERT INTO `utilisateur`(`ID_SEXE`, `ID_SPORT`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `ANNEE_DE_NAISSANCE`, `EMAIL`, `PASSWORD`) VALUES (:sexe,:sport,:name,:prenom,:year,:email,:password)";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':sexe', $data->sexe, PDO::PARAM_INT);
            $exe_check->bindParam(':sport', $data->sport, PDO::PARAM_INT);
            $exe_check->bindParam(':name', $data->name, PDO::PARAM_STR);
            $exe_check->bindParam(':prenom', $data->prenom, PDO::PARAM_STR);
            $exe_check->bindParam(':year', $data->year, PDO::PARAM_STR);
            $exe_check->bindParam(':email', $data->email, PDO::PARAM_STR);
            $exe_check->bindParam(':password', $data->password, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
            return 200; //OK l'utilisateur est créé
            //rajouter un try and catch avec try le return 200 et catch un return 500 en disant qu'on peut pas faire la requête SQM
        }
        return 409; //code conflict donc pas possible de le créer car l'email est déjà utilisé
    }
    return 400; //Il manque une information
}

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
    }

switch($_SERVER["REQUEST_METHOD"]) {
    /*case 'GET':
        $result = loginUser($pdo, json : file_get_contents('php://input'));
        setHeaders();
        exit(json_encode(value: $result));
    */
    case 'POST':
        $result = registerUser($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    /*case 'PUT':
        $result = update_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    case 'DELETE':
        $result = delete_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
        */
    }