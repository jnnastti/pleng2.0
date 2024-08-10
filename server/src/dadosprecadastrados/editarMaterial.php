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

$idmat = $_POST['idmat'];
$nome = $_POST['nome'];
$fornecedor = $_POST['fornecedor'];
$unidade = $_POST['unidade'];
$preco = $_POST['preco'];


if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE material SET
                            nome = '$nome',
                            fornecedor = '$fornecedor',
                            unidade = '$unidade',
                            preco = '$preco'
                          WHERE idmat = '$idmat'");

    header('location:../../../web/pages/dadosprecadastrados/material/index.php');
}

?>