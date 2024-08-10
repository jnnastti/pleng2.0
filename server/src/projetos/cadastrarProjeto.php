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
$descricao = $_POST['descricao'];
$estado = $_POST['state'];
$cidade = $_POST['city'];
$endereco = $_POST['endereco'];
$empreiteiro = $_POST['empreiteiro'];
$data = $_POST['data_inicio'];
$qtde_dias = $_POST['qtde_dias'];

$usuario = $_SESSION['idUsuAtivo'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("INSERT INTO projeto(nome, descricao, estado, cidade, endereco, idemp, data_inicio, qtde_dias, idusu, finalizado) 
        VALUES ('".$nome."','".$descricao."','".$estado."','".$cidade."','".$endereco."','".$empreiteiro."','".$data."', '".$qtde_dias."', '".$usuario."', 'N')");

    header('location:../../../web/pages/home/index.php');
}


?>