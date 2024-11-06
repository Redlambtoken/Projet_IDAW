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
    if((isset($data->Text)) && (isset($data->Note)) && $data->Note != "" && $_SESSION["user_login"] != null ){ //C'est à changer selon la base de donnée
        $verif = 0;
        $sql_check = "INSERT INTO `avis`(`TEXT`, `ID_UTILISATEUR`, `NOTE`, `VERIF`) VALUES (:Text,:IDU, :NOTE,:VERIF)";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':IDU', $_SESSION["user_id"], PDO::PARAM_STR);
        $exe_check->bindParam(':Text', $data->Text, PDO::PARAM_STR);
        $exe_check->bindParam(':NOTE', $data->Note, PDO::PARAM_INT);
        $exe_check->bindParam(':VERIF', $verif, PDO::PARAM_INT);
        $exe_check->execute();
        return 201; //L'avis est bien créé
    }
    return 400; //404 Mauvaise saisie de paramètres
}