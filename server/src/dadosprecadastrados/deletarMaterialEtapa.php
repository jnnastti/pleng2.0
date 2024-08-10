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

$dados = $_POST['data'];
$infos = json_decode($dados, true);

$material = $infos['Material'];
$etapa = $infos['Etapa'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM material_etapa WHERE idmat = $material AND idetapa = $etapa");

    echo "../materialetapa";
}

?>