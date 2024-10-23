<?php

//end point du login qui demande un get avec un json en param avec un hash md5
require_once("init_pdo.php");
require_once("avis.php");

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
    }

switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = getAvis($pdo);
        if($result != 404){
            http_response_code(response_code: 200);
        }
        else {
            http_response_code(response_code: $result);
        }
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST':
        $result = createAvis($pdo, json: file_get_contents('php://input'));
        if($result != 400){
            http_response_code(response_code: 200);
        }
        else {
            http_response_code(response_code: $result);
        }
        exit(json_encode(value: $result));
    }