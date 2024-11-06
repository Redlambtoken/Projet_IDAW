<?php 

function getCalcul($db){

if($_SESSION["user_login"] != null){
    $date =  new DateTime();
    $sql = "SELECT fd.ID_NUTRIMENT, fd.QUANTITE, da.GOAL, n.LABEL_NUTRIMENT, c.NUMBER  FROM `repas` AS r JOIN `contient` AS c ON c.ID_REPAS = r.ID_REPAS JOIN `nourriture` AS no ON no.ID_ALIMENT = c.ID_ALIMENT JOIN `fait_de` AS fd ON c.ID_ALIMENT = fd.ID_ALIMENT INNER JOIN `doc_alimentation` AS da ON da.ID_apport = fd.ID_NUTRIMENT JOIN `nutriment` AS n ON fd.ID_NUTRIMENT = n.ID_NUTRIMENT WHERE r.DATE_REPAS > :date_repas AND r.ID_UTILISATEUR = :user_id AND da.ID_SPORT = :idsport AND da.ID_SEXE = :idsexe AND da.ID_AGE = :idage ORDER BY r.DATE_REPAS ";
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
//
return 400;
}