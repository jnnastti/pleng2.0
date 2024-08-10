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
$nome = $_POST['nome'];
$duracao = $_POST['duracao'];


if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE etapa SET
                            nome = '$nome',
                            duracao = '$duracao'
                          WHERE idetapa = '$idetapa'");

    header('location:../../../web/pages/dadosprecadastrados/etapa/index.php');
}

?>