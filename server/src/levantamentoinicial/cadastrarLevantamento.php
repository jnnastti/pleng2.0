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

$etapa = $_POST['etapa'];
$grupo = $_POST['grupo'];
$tamanho_total = $_POST['tamanho_total'];
$unidade = $_POST['unidade'];
$pos = $_POST['posicao'];
$situacao = $_POST['situacao'];
$descricao = $_POST['descricao'];
$projeto = $_SESSION['idProjAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO etapa_projeto(idetapa, tamanho_total, unidade, pos, situacao, descricao, idproj, idgrupo) 
                          VALUES ('".$etapa."','".$tamanho_total."','".$unidade."','".$pos."','".$situacao."','".$descricao."','".$projeto."','".$grupo."')");

    header('location:../../../web/pages/levantamentoinicial/index.php');
}


?>