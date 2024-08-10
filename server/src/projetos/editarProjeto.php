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

$id = $_SESSION['idProjAtivo'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$empreiteiro = $_POST['empreiteiro'];
$descricao = $_POST['descricao'];
$data = $_POST['data_inicio'];
$qtde_dias = $_POST['qtde_dias'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("UPDATE projeto SET
                            nome = '$nome',
                            endereco = '$endereco',
                            idemp = '$empreiteiro',
                            descricao = '$descricao',
                            data_inicio = '$data',
                            qtde_dias = $qtde_dias
                          WHERE idproj = '$id'");

    $result = $db->query("SELECT * FROM projeto WHERE idproj = '$id'");

    while ($row = $result->fetchArray()) {
        $_SESSION['idProjAtivo'] = $row['idproj'];
        $_SESSION['nomeProjAtivo'] = $row['nome'];
        $_SESSION['descProjAtivo'] = $row['descricao'];
        $_SESSION['endProjAtivo'] = $row['endereco'];
        $_SESSION['empProjAtivo'] = $row['idemp'];
        $_SESSION['dataProjAtivo'] = $row['data_inicio'];
        $_SESSION['qtdeDiasProjAtivo'] = $row['qtde_dias'];
    }

    header('location:../../../web/pages/projetos/editar/index.php');
}

?>