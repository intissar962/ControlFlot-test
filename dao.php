<?php 
include './connection.php';
//data access object
function selectConducteur()
{
    global $db;
    $req = $db->query("SELECT conducteur FROM ecoca");
    return $req->fetchAll();
}

//Séléctionner les évènements
function selectEvents($cond, $dateD, $dateF)
{
    $dateDC=strtotime($dateD);
    $dateFC=strtotime($dateF);
    
    global $db;
    $req = $db->query("SELECT * FROM ecoca WHERE conducteur='$cond' AND debut >= $dateDC AND  fine <= $dateFC");
    return $req->fetchAll();
}

?>