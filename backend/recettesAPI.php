<?php
session_start();
require_once("init_pdo.php");
require_once("recettes.php");
 function setHeaders() {
 // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
 header("Access-Control-Allow-Origin: *");
 header('Content-type: application/json; charset=utf-8');
 }


 // ==============
 // Responses
 // ==============
 switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = getRecette($pdo); //il y aura beaucoup de conditio sur le get donc un peu long
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST': //Jeton JWT à rajouter pour savoir lesquelles ajouter sur le compte
        $result = createRecette($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    /*case 'PUT'://Jeton JWT à rajouter pour savoir lesquelles changer
        $result = update_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    case 'DELETE': //Jeton JWT à rajouter pour savoir lesquelles enlever
        $result = deleteEat($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));*/
    }