<?php
session_start();
require_once("init_pdo.php");
require_once("calendeatCalcul.php");
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
        $result = getCalcul($pdo);
        setHeaders();
        exit(json_encode(value: $result));
    }