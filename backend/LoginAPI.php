<?php 
require_once("init_pdo.php");
require_once("login.php");
require_once("register.php");

switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = loginUser($pdo, json : file_get_contents('php://input'));
        http_response_code(response_code: $result);
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST':
        $result = registerUser($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    }