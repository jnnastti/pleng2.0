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
$grupo = $infos['Grupo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM qtde_material WHERE idmat = $material AND idgrupo = $grupo");

    echo "../materialgrupo";
}

?>