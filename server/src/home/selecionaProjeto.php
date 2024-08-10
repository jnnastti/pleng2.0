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

$idproj = $_POST['id'];

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("SELECT * FROM projeto WHERE idproj = '$idproj'");
    
    $qtdeDias;
    $dateNow = 0;
    $dateStart = 0;

    
    while ($row = $result->fetchArray()) {
        $dateStart = $row['data_inicio'];
        $dateNow   = date('Y-m-d');

        $d1 = strtotime($dateStart); 
        $d2 = strtotime($dateNow);
    }

    $dataFinal = ($d2 - $d1) /86400;

    if($dataFinal < 0)
        $dataFinal *= -1;
    
    $result = $db->query("UPDATE projeto SET qtde_dias = '$dataFinal' WHERE idproj = '$idproj'");
    
    $resultSel = $db->query("SELECT * FROM projeto WHERE idproj = '$idproj'");

    while ($row = $resultSel->fetchArray()) {
        $_SESSION['idProjAtivo'] = $row['idproj'];
        $_SESSION['nomeProjAtivo'] = $row['nome'];
        $_SESSION['descProjAtivo'] = $row['descricao'];
        $_SESSION['estProjAtivo'] = $row['estado'];
        $_SESSION['cidProjAtivo'] = $row['cidade'];
        $_SESSION['endProjAtivo'] = $row['endereco'];
        $_SESSION['empProjAtivo'] = $row['idemp'];
        $_SESSION['dataProjAtivo'] = $row['data_inicio'];
        $_SESSION['diasProjAtivo'] = $row['qtde_dias'];
    }

    header('location:../../../web/pages/projetos/editar/index.php');
}
?>