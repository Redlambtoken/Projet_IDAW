<?php 

//attention il faut mettre dans une autre table afin de séparer les recette perso et les recette qu'on veut
//il faudra mettre une colonne avec l'ID de l'utilisateur qui le créé pour le fetch
function getRecette($db){
    //rajouter les conditions sur des aliments
    if($_SESSION["user_login"] != null){
        $sql_check = "SELECT `NOM_RECETTE`, `ID_CAT`, `ID_SCAT`, `ID_SSCAT`  FROM `recette` WHERE ID_UTILISATEUR = ".$_SESSION["user_id"]."";
        $exe_check = $db->prepare($sql_check);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    }
    return 404;
}

function createRecette($db,$json){
    $data = json_decode($json);value: 
    if((isset($data->nameR)) && $_SESSION["user_login"] != null && (isset($data->IDa)) && (isset($data->Qte))){
        $sql = "INSERT INTO `recette`(`NOM_RECETTE`) VALUES (:nameR)";
        $exe = $db->prepare($sql);
        $exe->bindParam(':nameR', $data->nameR, PDO::PARAM_STR);
        $exe->execute();
        $sql = "SELECT `ID_RECETTE` FROM `recette` WHERE 1";
        $exe = $db->prepare($sql);
        $exe->bindParam(':nameR', $data->nameR, PDO::PARAM_STR);
        $exe->execute();
        $ID_Recette = $exe->fetch(PDO::FETCH_OBJ);
        if(isset($data->cat)){
            $sqlUpate = "UPDATE `recette` SET `ID_CAT`=:IDCat WHERE ID_RECETTE = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDCat', $data->cat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_Recette, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        if(isset($data->scat)){
            $sqlUpate = "UPDATE `recette` SET `ID_SCAT`=:IDSCat WHERE ID_RECETTE = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDSCat', $data->scat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_Recette, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        if(isset($data->sscat)){
            $sqlUpate = "UPDATE `recette` SET `ID_SSCAT`=:IDSSCat WHERE ID_RECETTE = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDSSCat', $data->sscat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_Recette, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        $sql = "INSERT INTO `fait_de`(`ID_RECETTE`, `ID_ALIMENT`, `QUANTITE`) VALUES (:ID_R,:ID_A,:QTE)";
        $exe = $db->prepare($sql);
        $exe->bindParam(':ID_R', $ID_Recette, PDO::PARAM_STR);
        $exe->bindParam(':ID_A', $data->IDa, PDO::PARAM_INT);
        $exe->bindParam(':QTE', $data->Qte, PDO::PARAM_INT);
        $exe->execute();
        return 201;
    }
    return 401;
}