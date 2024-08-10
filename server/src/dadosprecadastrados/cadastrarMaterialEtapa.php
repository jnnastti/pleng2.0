<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$idetapa = $_POST['idetapa'];
$idmat = $_POST['material'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO material_etapa(idetapa, idmat) 
        VALUES ('".$idetapa."', '".$idmat."')");

    header('location:../../../web/pages/dadosprecadastrados/materialetapa/index.php');
}

?>