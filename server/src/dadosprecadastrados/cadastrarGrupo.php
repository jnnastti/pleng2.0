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

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO grupo_material(nome) 
        VALUES ('".$nome."')");

    header('location:../../../web/pages/dadosprecadastrados/grupo/index.php');
}

?>