<?php 

function getEat($db){

if(isset($_GET["day"]) && $_SESSION["user_login"] != null){
    $date =  new DateTime();
    $date->modify(-(int)$_GET["day"] .'days');
    $sql = "SELECT * FROM repas WHERE ID_UTILISATEUR = ".$_SESSION["user_id"] ." AND DATE_REPAS > :date_repas ORDER By repas.DATE_REPAS";
    $exe = $db->prepare($sql);
    $exe->bindValue(':date_repas', $date->format('Y-m-d'));
    $exe->execute();
    $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
else{
    $sql = "SELECT * FROM repas";
    $exe = $db->prepare($sql);
    $exe->execute();
    $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
}

function createEat($db, $json){ //peut-être enlevé les fetch car ils ne sont pas hyper utiles
    $data = json_decode($json);
    //il me faut une ou des recettes
    if(isset($data->recettes) && $_SESSION["user_login"] != null){ //on va recevoir un token JWT
        // rajouter le SELECT avec le jeton JWT
        
        $sqlSearchID = "SELECT ID_REPAS FROM `repas` ORDER BY `ID_REPAS` DESC LIMIT 1;";
        $exe_checkID = $db->prepare($sqlSearchID);
        $exe_checkID->execute();
        $result = $exe_checkID->fetch(PDO::FETCH_OBJ)['ID_REPAS'];

        foreach($data->recettes as &$recette){ //à voir si on m'envois les ID des recettes ou les Noms des recettes
            $sql = "INSERT INTO `contient`(`ID_REPAS`, `ID_RECETTE`) VALUES (:ID_REPAS,:ID_RECETTE);";
            $exe = $db->prepare($sql);
            $exe->bindParam(':ID_REPAS', $result, PDO::PARAM_INT);
            $exe->bindParam(':ID_RECETTE', $recette, PDO::PARAM_INT);
            $exe->execute();
        }
        
        if(isset($data->date)){ //on va recevoir un token JWT
            $sql = "INTO `repas`(`ID_UTILISATEUR`, `DATE_REPAS`) VALUES (:ID_UTILISATEUR,:DATE_REPAS)"; //l'ID Utilisateur va être envoyé par Suzanne-Léonore
            $exe = $db->prepare($sql);
            $exe->bindParam(':DATE_REPAS', $data->date , PDO::PARAM_STR);
            $exe->bindParam(':ID_UTILISATEUR', $_SESSION["user_id"], PDO::PARAM_INT);
            $exe->execute();
            return 201;
        }
        $sql = "INTO `repas`(`ID_UTILISATEUR`, `DATE_REPAS`) VALUES (:ID_UTILISATEUR,:DATE_REPAS)"; //l'ID Utilisateur va être envoyé par Suzanne-Léonore
            $exe = $db->prepare($sql);
            $exe->bindParam(':DATE_REPAS', date("Y-m-d") , PDO::PARAM_STR);
            $exe->bindParam(':ID_UTILISATEUR', $_SESSION["user_id"], PDO::PARAM_INT);
            $exe->execute();
            $res = $exe->fetch(PDO::FETCH_OBJ);
            return 201;
    }
    else {
        return 400;
    }
}
