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

$nome = $_POST['nome'];
$duracao = $_POST['duracao'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO etapa(nome, duracao) 
        VALUES ('".$nome."', '".$duracao."')");

    header('location:../../../web/pages/dadosprecadastrados/etapa/index.php');
}

?>