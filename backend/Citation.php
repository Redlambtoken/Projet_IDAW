<?php 
function getCitation($db){
    $sql_check = "SELECT CITATION_TEXT FROM `citation` WHERE 1";
    $exe_check = $db->prepare($sql_check);
    $exe_check->execute();
    $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
    if($res_check != null){
        return $res_check; //OK l'utilisateur existe bel et bien
    }
    return 404;
}