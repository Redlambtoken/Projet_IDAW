<?php
/*
-------------------------------------------------------------------------------------------------------

                Ceci est le squelette de l'API, il est à changer

-------------------------------------------------------------------------------------------------------
*/
/* Commentaires :

Il faudra vérifier les failles SQLi

*/

 require_once("init_pdo.php");

 /*function get_users($db){

    if(isset($_GET["id"])){
        $sql = "SELECT * FROM USERS WHERE id = ".$_GET["id"];
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
        $sql = "SELECT * FROM USERS";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
 }
 function create_users($db, $json){
    $data = json_decode($json);
    
    if(isset($data->email) && isset($data->name)){
        $sql_check = "SELECT `email` FROM `users` WHERE email = '".$data->email."'";
        $exe_check = $db->query($sql_check);
        $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
        if($res_check != null){
            return 409; //code conflict donc pas possible de le créer
        }
        $sql = "INSERT INTO `users`(`name`, `email`) VALUES ('".$data->name."','".$data->email."')";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        $sql_get = "SELECT * FROM `users` WHERE email = '".$data->email."'";
        $exe_get = $db->query($sql_get);
        $res_get = $exe_get->fetchAll(PDO::FETCH_OBJ);
        $response = array("ID"=> $res_get[0]->id, "Name"=>$res_get[0]->name, "Email"=>$res_get[0]->email);
        return $response;
    }
    return 400;
    }

function update_users($db, $json){
    $data = json_decode($json);
    if(isset($data->id) && (isset($data->name) || isset($data->email))){
        $sql_check = "SELECT * FROM `users` WHERE id = ".$data->id."";
        $exe_check = $db->query($sql_check);
        $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
        if($res_check != null){
            $name_actual = $res_check[0]->name;
            $email_actual = $res_check[0]->email;
            if(isset($data->name)){
                $name_actual = $data->name;
            }
            if(isset($data->email)){
                $email_actual = $data->email;
            }
            $sql = "UPDATE `users` SET `name`='".$name_actual."',`email`='".$email_actual."' WHERE id =".$data->id;
            $exe = $db->query($sql);
            $res = $exe->fetchAll(PDO::FETCH_OBJ);
            return 200;
        }
        return 404; //404 pas de user avec cet id
    }
    return 400;
}

function delete_users($db, $json){
    $data = json_decode($json);
    if(isset($data->id)){
        $sql_check = "SELECT * FROM `users` WHERE id = ".$data->id."";
        $exe_check = $db->query($sql_check);
        $res_check = $exe_check->fetchAll(PDO::FETCH_OBJ);
        if($res_check != null){
            $sql = "DELETE FROM `users` WHERE id = ".$data->id;
            $exe = $db->query($sql);
            $res = $exe->fetchAll(PDO::FETCH_OBJ);
            return 200;
        }
        return 404; //404 pas de user avec cet id
    }
    return 400;
}*/
 function setHeaders() {
 // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
 header("Access-Control-Allow-Origin: *");
 header('Content-type: application/json; charset=utf-8');
 }


 // ==============
 // Responses
 // ==============
 switch($_SERVER["REQUEST_METHOD"]) {
    /*case 'GET':
        $result = get_users($pdo);
        setHeaders();
        exit(json_encode(value: $result));
    case 'POST':
        $result = create_users($pdo, json: file_get_contents('php://input'));
        if($result != 400 && $result != 409){
            http_response_code(response_code: 200);
        }
        else {
            http_response_code(response_code: $result);
        }
        exit(json_encode(value: $result));
    case 'PUT':
        $result = update_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
    case 'DELETE':
        $result = delete_users($pdo, json: file_get_contents('php://input'));
        http_response_code(response_code: $result);
        exit(json_encode(value: $result));
        */
    }