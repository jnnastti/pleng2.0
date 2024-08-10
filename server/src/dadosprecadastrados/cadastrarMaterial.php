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
$fornecedor = $_POST['fornecedor'];
$unidade = $_POST['unidade'];
$preco = $_POST['preco'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO material(nome, fornecedor, unidade, preco) 
        VALUES ('".$nome."','".$fornecedor."','".$unidade."','".$preco."')");

    header('location:../../../web/pages/dadosprecadastrados/material/index.php');
}

?>