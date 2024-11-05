<?php 

function getAvis($db){
        $sql_check = "SELECT avis.TEXT, utilisateur.NOM_UTILISATEUR FROM `avis` INNER JOIN utilisateur ON avis.ID_UTILISATEUR = utilisateur.ID_UTILISATEUR WHERE avis.VERIF = 1";
        $exe_check = $db->prepare($sql_check);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    return 404;
}

function createAvis($db, $json){
    $data = json_decode($json);
    if((isset($data->Text)) && $_SESSION["user_login"] != null ){ //C'est à changer selon la base de donnée
        $sql_check = "INSERT INTO `avis`(`Text`, `nameAuteur`) VALUES (:Text,:nameAuteur)";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':nameAuteur', $_SESSION["user_name"], PDO::PARAM_STR);
        $exe_check->bindParam(':Text', $data->Text, PDO::PARAM_STR);
        $exe_check->execute();
        return 201; //L'avis est bien créé
    }
    return 400; //404 Mauvaise saisie de paramètres
}