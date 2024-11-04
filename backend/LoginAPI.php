<?php 
session_start();
require_once("init_pdo.php");
require_once("login.php");
require_once("register.php");

switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = Disconnect();
        http_response_code(response_code: $result);
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST':
        $result = loginUser($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        setHeaders();
        exit(json_encode(value: $result));
    /*case 'PUT':
        $result = modifyPassworUser($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));*/
    }
    //rajouter un PUT pour modifier le mdp, premier Envois de PUT pour savoir si l'utilisateur existe et ensuite je reçois un nouveau PUT pour modifier le mdp