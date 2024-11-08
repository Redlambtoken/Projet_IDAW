<?php 

function getCalcul($db){

if($_SESSION["user_login"] != null){
    $date =  new DateTime();
    $sql = "SELECT da.GOAL, da.ID_apport, n.LABEL_NUTRIMENT, COALESCE(SUM(fd.QUANTITE * c.NUMBER), 0) AS QUANTITE, fd.ID_NUTRIMENT FROM `doc_alimentation` AS da
        LEFT JOIN `nutriment` AS n ON da.ID_apport = n.ID_NUTRIMENT
        LEFT JOIN `fait_de` AS fd ON fd.ID_NUTRIMENT = da.ID_apport
        LEFT JOIN `contient` AS c ON c.ID_ALIMENT = fd.ID_ALIMENT
        LEFT JOIN `repas` AS r ON r.ID_REPAS = c.ID_REPAS AND r.ID_UTILISATEUR = :user_id
        WHERE da.ID_SPORT = :idsport AND da.ID_SEXE = :idsexe AND da.ID_AGE = :idage AND (r.DATE_REPAS > :date_repas OR r.DATE_REPAS IS NULL)
        GROUP BY da.ID_apport
        ORDER BY n.LABEL_NUTRIMENT";
    $exe = $db->prepare($sql);
    $exe->bindValue(':date_repas', $date->format('Y-m-d'));
    $exe->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
    $exe->bindParam(':idsexe', $_SESSION["user_sexe"], PDO::PARAM_INT);
    $exe->bindParam(':idage', $_SESSION["user_age"], PDO::PARAM_INT);
    $exe->bindParam(':idsport', $_SESSION["user_sport"], PDO::PARAM_INT);
    $exe->execute();
    $res = $exe->fetchAll(PDO::FETCH_OBJ);

   

    return $res;
}
return 400;
}