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

$idetapa = $infos['id'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM etapa_diario WHERE idetapadiario = $idetapa");

    echo "../materialetapa";
}

?>