<?php
session_start();
//end point du login qui demande un get avec un json en param avec un hash md5
require_once("init_pdo.php");
require_once("Citation.php");

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
    }

switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = getCitation($pdo);
        if($result != 404){
            http_response_code(response_code: 200);
        }
        else {
            http_response_code(response_code: $result);
        }
        setHeaders();
        exit(json_encode($result));
    }