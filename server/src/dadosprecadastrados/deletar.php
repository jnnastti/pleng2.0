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

$tabela = $infos['tabela'];
$idColumn = $infos['idcolumn'];
$id = $infos['id'];
$pagina = $infos['pagina'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM $tabela WHERE $idColumn = '$id'");

    echo "../$pagina";
}

?>