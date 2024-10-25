<?php

require_once("init_pdo.php");
require_once("calendeat.php");
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
        $result = getEat($pdo);
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST': //ici il ne marche pas car il faut mettre en place les jetons JWT
        $result = createEat($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    case 'PUT':
        $result = update_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    case 'DELETE':
        $result = deleteEat($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
        
    }