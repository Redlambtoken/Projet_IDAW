<?php 

function getRecette($db,$json){ //Puis-je recevoir une méthode get sans body ?
    $data = json_decode($json);
    if($_SESSION["user_login"] != null){
        $sql_check = "SELECT `LABEL_ALIMENT_PERSO` FROM `nourriture_perso` WHERE ID_UTILISATEUR = ".$_SESSION["user_id"]."";
        $exe_check = $db->prepare($sql_check);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check;
        }
    }
    if(isset($data->ID_CAT) && isset($data->ID_SCAT) && isset($data->ID_SSCAT)){
        if(isset($data->name)){
            if(isset($data->ID_N) && isset($data->MaxQTE)){
                $name = $data->name . "%";
                $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC AND ID_SCAT = :IDSC AND ID_SSCAT = :IDSSC AND LABEL_ALIMENT like :nameA GROUP BY nourriture.ID_ALIMENT";
                $exe_check = $db->prepare($sql_check);
                $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
                $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
                $exe_check->bindParam(':IDSSC', $data->ID_SSCAT, PDO::PARAM_INT);
                $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
                $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
                $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
                $exe_check->execute();
                $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
                if($res_check != null){
                    return $res_check; //OK l'utilisateur existe bel et bien
                }
            }
            $name = $data->name . "%";
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC AND ID_SCAT = :IDSC AND ID_SSCAT = :IDSSC AND LABEL_ALIMENT like :nameA";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSSC', $data->ID_SSCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        else  if(isset($data->ID_N) && isset($data->MaxQTE)){
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC AND ID_SCAT = :IDSC AND ID_SSCAT = :IDSSC GROUP BY nourriture.ID_ALIMENT";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSSC', $data->ID_SSCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
            $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC AND ID_SCAT = :IDSC AND ID_SSCAT = :IDSSC";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
        $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
        $exe_check->bindParam(':IDSSC', $data->ID_SSCAT, PDO::PARAM_INT);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    }
    else if(isset($data->ID_CAT) && isset($data->ID_SCAT)){
        if(isset($data->name)){
            if(isset($data->ID_N) && isset($data->MaxQTE)){
                $name = $data->name . "%";
                $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC AND ID_SCAT = :IDSC AND LABEL_ALIMENT like :nameA GROUP BY nourriture.ID_ALIMENT";
                $exe_check = $db->prepare($sql_check);
                $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
                $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
                $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
                $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
                $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
                $exe_check->execute();
                $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
                if($res_check != null){
                    return $res_check; //OK l'utilisateur existe bel et bien
                }
            }
            $name = $data->name . "%";
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC AND ID_SCAT = :IDSC AND LABEL_ALIMENT like :nameA";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        else  if(isset($data->ID_N) && isset($data->MaxQTE)){
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC AND ID_SCAT = :IDSC GROUP BY nourriture.ID_ALIMENT";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
            $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
            $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC AND ID_SCAT = :IDSC";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
        $exe_check->bindParam(':IDSC', $data->ID_SCAT, PDO::PARAM_INT);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    }
    else if(isset($data->ID_CAT)){
        if(isset($data->name)){
            if(isset($data->ID_N) && isset($data->MaxQTE)){
                $name = $data->name . "%";
                $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC AND LABEL_ALIMENT like :nameA GROUP BY nourriture.ID_ALIMENT";
                $exe_check = $db->prepare($sql_check);
                $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
                $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
                $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
                $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
                $exe_check->execute();
                $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
                if($res_check != null){
                    return $res_check; //OK l'utilisateur existe bel et bien
                }
            }
            $name = $data->name . "%";
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC AND LABEL_ALIMENT like :nameA";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        else  if(isset($data->ID_N) && isset($data->MaxQTE)){
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND ID_CAT = :IDC GROUP BY nourriture.ID_ALIMENT";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
            $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
            $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE ID_CAT = :IDC";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':IDC', $data->ID_CAT, PDO::PARAM_INT);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    }
    else if(isset($data->name)){
        $name = $data->name . "%";
        if(isset($data->ID_N)  && isset($data->MaxQTE)){
            $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N AND LABEL_ALIMENT like :nameA GROUP BY nourriture.ID_ALIMENT";
            $exe_check = $db->prepare($sql_check);
            $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
            $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
            $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
            $exe_check->execute();
            $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
            if($res_check != null){
                return $res_check; //OK l'utilisateur existe bel et bien
            }
        }
        $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` WHERE LABEL_ALIMENT like :nameA";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':nameA', $name, PDO::PARAM_STR);
        $exe_check->execute();
        $res_check = $exe_check->fetchALL(PDO::FETCH_OBJ);
        if($res_check != null){
            return $res_check; //OK l'utilisateur existe bel et bien
        }
    }
    else if(isset($data->ID_N)  && isset($data->MaxQTE)){
        $sql_check = "SELECT `LABEL_ALIMENT` FROM `nourriture` INNER JOIN `fait_de` ON nourriture.ID_ALIMENT = fait_de.ID_ALIMENT WHERE fait_de.QUANTITE > :MaxQTE AND fait_de.ID_NUTRIMENT = :ID_N GROUP BY nourriture.ID_ALIMENT";
        $exe_check = $db->prepare($sql_check);
        $exe_check->bindParam(':ID_N', $data->ID_N, PDO::PARAM_INT);
        $exe_check->bindParam(':MaxQTE', $data->MaxQTE, PDO::PARAM_STR);
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
    if((isset($data->nameR)) && $_SESSION["user_login"] != null && (isset($data->IDas)) && (isset($data->Qtes))){
        $sql = "INSERT INTO `nourriture_perso`(`LABEL_ALIMENT_PERSO`,`ID_UTILISATEUR`) VALUES (:nameR,:IDUtilisateur)";
        $exe = $db->prepare($sql);
        $exe->bindParam(':nameR', $data->nameR, PDO::PARAM_STR);
        $exe->bindParam(':IDUtilisateur', $_SESSION["user_id"], PDO::PARAM_INT);
        $exe->execute();
        $sql = "SELECT `ID_ALIMENT_PERSO` FROM `nourriture_perso` WHERE 1";
        $exe = $db->prepare($sql);
        $exe->execute();
        $ID_ALIMENT_PERSO = $exe->fetch(PDO::FETCH_OBJ);
        if(isset($data->cat)){
            $sqlUpate = "UPDATE `nourriture_perso` SET `ID_CAT`=:IDCat WHERE ID_ALIMENT_PERSO = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDCat', $data->cat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_ALIMENT_PERSO->ID_ALIMENT_PERSO, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        if(isset($data->scat)){
            $sqlUpate = "UPDATE `nourriture_perso` SET `ID_SCAT`=:IDSCat WHERE ID_ALIMENT_PERSO = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDSCat', $data->scat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_ALIMENT_PERSO->ID_ALIMENT_PERSO, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        if(isset($data->sscat)){
            $sqlUpate = "UPDATE `nourriture_perso` SET `ID_SSCAT`=:IDSSCat WHERE ID_ALIMENT_PERSO = :ID_R";
            $exeUpdate = $db->prepare($sqlUpate);
            $exeUpdate->bindParam(':IDSSCat', $data->sscat, PDO::PARAM_INT);
            $exeUpdate->bindParam(':ID_R', $ID_ALIMENT_PERSO->ID_ALIMENT_PERSO, PDO::PARAM_STR);
            $exeUpdate->execute();
        }
        foreach($data->IDas as $index => $IDa){
            $sql = "INSERT INTO `fait_de_perso`(`ID_NUTRIMENT`, `ID_ALIMENT_PERSO`, `QUANTITE`) VALUES (:ID_A,:ID_R,:QTE)";
            $exe = $db->prepare($sql);
            $exe->bindParam(':ID_R', $ID_ALIMENT_PERSO->ID_ALIMENT_PERSO, PDO::PARAM_STR);
            $exe->bindParam(':ID_A', $IDa, PDO::PARAM_INT);
            $exe->bindParam(':QTE', $data->Qtes[$index], PDO::PARAM_INT);
            $exe->execute();
        }
        return 201;
    }
    return 401;
}