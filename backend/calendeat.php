<?php 

function getEat($db){

if(isset($_GET["day"])){
    $date =  new DateTime();
    $date->modify(-(int)$_GET["day"] .'days');
    $sql = "SELECT * FROM repas WHERE DATE_REPAS > :date_repas ORDER By repas.DATE_REPAS";
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

function deleteEat($db, $json){
    $data = json_decode($json);
    
}
