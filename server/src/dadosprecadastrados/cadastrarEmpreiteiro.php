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

    $result = $db->query("INSERT INTO empreiteiro(nome) 
        VALUES ('".$nome."')");

    header('location:../../../web/pages/dadosprecadastrados/empreiteiro/index.php');
}

?>