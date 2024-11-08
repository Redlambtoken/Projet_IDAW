<?php 

function getEat($db){

    if(isset($_GET["day"]) && $_SESSION["user_login"] != null){
        $date =  new DateTime();
        $date->modify(-(int)$_GET["day"] .'days');
        $sql = "SELECT repas.DATE_REPAS, nourriture.LABEL_ALIMENT FROM `repas` JOIN `contient` ON contient.ID_REPAS = repas.ID_REPAS JOIN `nourriture` ON nourriture.ID_ALIMENT = contient.ID_ALIMENT WHERE DATE_REPAS > :date_repas AND ID_UTILISATEUR = :user_id ORDER By repas.DATE_REPAS";
        $exe = $db->prepare($sql);
        $exe->bindValue(':date_repas', $date->format('Y-m-d'));
        $exe->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
        $exe->execute();
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    else if ($_SESSION["user_login"] != null){
        $sql = "SELECT repas.DATE_REPAS, nourriture.LABEL_ALIMENT FROM `repas` JOIN `contient` ON contient.ID_REPAS = repas.ID_REPAS JOIN `nourriture` ON nourriture.ID_ALIMENT = contient.ID_ALIMENT WHERE ID_UTILISATEUR = :user_id ORDER By repas.DATE_REPAS";
        $exe = $db->prepare($sql);
        $exe->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
        $exe->execute();
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    //
return 400;
}

function createEat($db, $json){ //peut-être enlevé les fetch car ils ne sont pas hyper utiles
    $data = json_decode($json);
    //il me faut une ou des recettes
    if(isset($data->recettes) && $_SESSION["user_login"] != null && isset($data->QTEs)){ //on va recevoir un token JWT
        
        if(isset($data->date)){ //on va recevoir un token JWT
            $sql = "INSERT INTO `repas`(`ID_UTILISATEUR`, `DATE_REPAS`) VALUES (:ID_UTILISATEUR,:DATE_REPAS)"; //l'ID Utilisateur va être envoyé par Suzanne-Léonore
            $exe = $db->prepare($sql);
            $exe->bindParam(':DATE_REPAS', $data->date , PDO::PARAM_STR);
            $exe->bindParam(':ID_UTILISATEUR', $_SESSION["user_id"], PDO::PARAM_INT);
            $exe->execute();
        }
        else {
            $sql = "INSERT INTO `repas`(`ID_UTILISATEUR`, `DATE_REPAS`) VALUES (:ID_UTILISATEUR,:DATE_REPAS)"; //l'ID Utilisateur va être envoyé par Suzanne-Léonore
            $exe = $db->prepare($sql);
            $exe->bindParam(':DATE_REPAS', date("Y-m-d") , PDO::PARAM_STR);
            $exe->bindParam(':ID_UTILISATEUR', $_SESSION["user_id"], PDO::PARAM_INT);
            $exe->execute();
        }

        $sqlSearchID = "SELECT ID_REPAS FROM `repas` ORDER BY `ID_REPAS` DESC LIMIT 1";
        $exe_checkID = $db->prepare($sqlSearchID);
        $exe_checkID->execute();    
        $result = $exe_checkID->fetch(PDO::FETCH_OBJ);

        foreach($data->recettes as $index => &$recette){ //à voir si on m'envois les ID des recettes ou les Noms des recettes
            $sql = "INSERT INTO `contient`(`ID_REPAS`, `ID_ALIMENT`, `NUMBER`) VALUES (:ID_REPAS,:ID_ALIMENT,:quantite);";
            $exe = $db->prepare($sql);
            $exe->bindParam(':ID_REPAS', $result->ID_REPAS, PDO::PARAM_INT);
            $exe->bindParam(':ID_ALIMENT', $recette, PDO::PARAM_INT);
            $exe->bindParam(':quantite', $data->QTEs[$index], PDO::PARAM_INT);
            $exe->execute();
        }
        return 201;
    }
    else {
        return 400;
    }
}
